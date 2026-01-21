<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of published blogs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::published()
            ->with('author')
            ->latest('published_at')
            ->paginate(12)
            ->appends(request()->query());
        
        return view('blogs', compact('blogs'));
    }

    /**
     * Display the specified blog post.
     * Increments view count when viewed.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($locale, $slug)
    {
        // First, try to find the blog by slug (regardless of status for debugging)
        $blog = Blog::with('author')
            ->where('slug', $slug)
            ->first();

        // If blog doesn't exist at all
        if (!$blog) {
            // Check if any blog exists with similar slug (for debugging)
            $similarBlogs = Blog::select('id', 'title', 'slug', 'status', 'published_at')
                ->where('slug', 'like', '%' . $slug . '%')
                ->orWhere('title', 'like', '%' . $slug . '%')
                ->limit(5)
                ->get();
            
            abort(404, 'Blog post with slug "' . $slug . '" not found. ' . 
                  ($similarBlogs->count() > 0 ? 'Similar blogs: ' . $similarBlogs->pluck('slug')->implode(', ') : ''));
        }

        // Check if blog is published
        if ($blog->status !== 'published') {
            abort(404, 'Blog post exists but is not published. Current status: ' . $blog->status);
        }

        // Check if published_at is in the future
        if ($blog->published_at && $blog->published_at->isFuture()) {
            abort(404, 'Blog post is scheduled for future publication: ' . $blog->published_at->format('Y-m-d H:i:s'));
        }

        // Increment view count
        $blog->increment('views');

        // Get related blogs (same category first, then latest if not enough)
        $relatedBlogs = Blog::published()
            ->where('id', '!=', $blog->id);
        
        if ($blog->category) {
            $relatedBlogs = $relatedBlogs->where('category', $blog->category);
        }
        
        $relatedBlogs = $relatedBlogs->latest('published_at')
            ->take(3)
            ->get();
        
        // If not enough related blogs, fill with latest blogs
        if ($relatedBlogs->count() < 3) {
            $additionalBlogs = Blog::published()
                ->where('id', '!=', $blog->id)
                ->whereNotIn('id', $relatedBlogs->pluck('id'))
                ->latest('published_at')
                ->take(3 - $relatedBlogs->count())
                ->get();
            
            $relatedBlogs = $relatedBlogs->merge($additionalBlogs);
        }

        // Get latest blogs (excluding current blog)
        $latestBlogs = Blog::published()
            ->with('author')
            ->where('id', '!=', $blog->id)
            ->latest('published_at')
            ->take(5)
            ->get();

        return view('blog-detail', compact('blog', 'relatedBlogs', 'latestBlogs'));
    }
}
