<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::with('author')->latest()->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'excerpt' => 'nullable|string|max:500',
                'body' => 'required|string',
                'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'body_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'category' => 'nullable|string|max:100',
                'tags' => 'nullable|string',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string|max:500',
                'status' => 'required|in:draft,published,archived',
                'published_at' => 'nullable|date',
            ]);

            // Generate slug from title
            $validated['slug'] = Str::slug($validated['title']);
            
            // Ensure unique slug
            $originalSlug = $validated['slug'];
            $counter = 1;
            while (Blog::where('slug', $validated['slug'])->exists()) {
                $validated['slug'] = $originalSlug . '-' . $counter;
                $counter++;
            }

            // Handle featured image upload
            if ($request->hasFile('featured_image')) {
                $imageName = time() . '_' . uniqid() . '.' . $request->file('featured_image')->getClientOriginalExtension();
                $imagePath = $request->file('featured_image')->storeAs('blogs/featured', $imageName, 'public');
                $validated['featured_image'] = $imagePath;
            }

            // Handle body images upload
            $bodyImages = [];
            if ($request->hasFile('body_images')) {
                foreach ($request->file('body_images') as $image) {
                    $imageName = time() . '_' . uniqid() . '_' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
                    $imagePath = $image->storeAs('blogs/body', $imageName, 'public');
                    $bodyImages[] = $imagePath;
                }
            }
            $validated['body_images'] = $bodyImages;

            // Handle tags (convert comma-separated string to array)
            if (!empty($validated['tags'])) {
                $validated['tags'] = array_map('trim', explode(',', $validated['tags']));
            } else {
                $validated['tags'] = [];
            }

            // Set author_id to current user
            $validated['author_id'] = auth()->id();

            // Set published_at if status is published and published_at is not set
            if ($validated['status'] === 'published' && empty($validated['published_at'])) {
                $validated['published_at'] = now();
            }

            Blog::create($validated);

            return redirect()->route('admin.blogs.index')
                ->with('success', 'Blog created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred while creating the blog: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::with('author')->findOrFail($id);
        return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $blog = Blog::findOrFail($id);

            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'excerpt' => 'nullable|string|max:500',
                'body' => 'required|string',
                'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'body_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'category' => 'nullable|string|max:100',
                'tags' => 'nullable|string',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string|max:500',
                'status' => 'required|in:draft,published,archived',
                'published_at' => 'nullable|date',
            ]);

            // Generate slug from title if title changed
            if ($blog->title !== $validated['title']) {
                $validated['slug'] = Str::slug($validated['title']);
                
                // Ensure unique slug
                $originalSlug = $validated['slug'];
                $counter = 1;
                while (Blog::where('slug', $validated['slug'])->where('id', '!=', $id)->exists()) {
                    $validated['slug'] = $originalSlug . '-' . $counter;
                    $counter++;
                }
            }

            // Handle featured image upload
            if ($request->hasFile('featured_image')) {
                // Delete old featured image
                if ($blog->featured_image) {
                    Storage::disk('public')->delete($blog->featured_image);
                }
                $imageName = time() . '_' . uniqid() . '.' . $request->file('featured_image')->getClientOriginalExtension();
                $imagePath = $request->file('featured_image')->storeAs('blogs/featured', $imageName, 'public');
                $validated['featured_image'] = $imagePath;
            }

            // Handle body images upload
            if ($request->hasFile('body_images')) {
                // Get existing body images
                $existingImages = $blog->body_images ?? [];
                
                // Upload new images
                $newImages = [];
                foreach ($request->file('body_images') as $image) {
                    $imageName = time() . '_' . uniqid() . '_' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
                    $imagePath = $image->storeAs('blogs/body', $imageName, 'public');
                    $newImages[] = $imagePath;
                }
                
                // Merge with existing images (or replace if you want to replace all)
                // For now, we'll append new images to existing ones
                $validated['body_images'] = array_merge($existingImages, $newImages);
            } else {
                // Keep existing images if no new ones uploaded
                $validated['body_images'] = $blog->body_images ?? [];
            }

            // Handle tags (convert comma-separated string to array)
            if (!empty($validated['tags'])) {
                $validated['tags'] = array_map('trim', explode(',', $validated['tags']));
            } else {
                $validated['tags'] = [];
            }

            // Set published_at if status is published and published_at is not set
            if ($validated['status'] === 'published' && empty($validated['published_at'])) {
                $validated['published_at'] = $blog->published_at ?? now();
            }

            $blog->update($validated);

            return redirect()->route('admin.blogs.index')
                ->with('success', 'Blog updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred while updating the blog: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $blog = Blog::findOrFail($id);

            // Delete featured image
            if ($blog->featured_image) {
                Storage::disk('public')->delete($blog->featured_image);
            }

            // Delete body images
            if ($blog->body_images) {
                foreach ($blog->body_images as $image) {
                    Storage::disk('public')->delete($image);
                }
            }

            $blog->delete();

            return redirect()->route('admin.blogs.index')
                ->with('success', 'Blog deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.blogs.index')
                ->with('error', 'An error occurred while deleting the blog: ' . $e->getMessage());
        }
    }

    /**
     * Remove a specific body image from the blog.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeBodyImage(Request $request, $id)
    {
        try {
            $blog = Blog::findOrFail($id);
            $imagePath = $request->input('image_path');

            if ($imagePath && $blog->body_images) {
                // Remove image from array
                $bodyImages = $blog->body_images;
                $key = array_search($imagePath, $bodyImages);
                if ($key !== false) {
                    unset($bodyImages[$key]);
                    $blog->body_images = array_values($bodyImages); // Re-index array
                    $blog->save();

                    // Delete image file
                    Storage::disk('public')->delete($imagePath);
                }
            }

            return response()->json(['success' => true, 'message' => 'Image removed successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
