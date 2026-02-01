<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminTeacherController extends Controller
{
    /**
     * Display a listing of teachers.
     */
    public function index()
    {
        $teachers = Teacher::orderBy('created_at', 'desc')->get();
        return view('admin.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new teacher.
     */
    public function create()
    {
        return view('admin.teachers.create');
    }

    /**
     * Store a newly created teacher in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:teachers,email',
                'phone' => 'nullable|string|max:50',
                'bio' => 'nullable|string',
                'specialization' => 'nullable|string|max:255',
                'qualification' => 'nullable|string|max:255',
                'experience_years' => 'nullable|integer|min:0|max:99',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'status' => 'required|in:active,inactive',
            ]);

            if ($request->hasFile('image')) {
                $imageName = time() . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
                $imagePath = $request->file('image')->storeAs('teachers', $imageName, 'public');
                $validated['image'] = $imagePath;
            }

            $validated['social_links'] = $this->buildSocialLinks($request);

            Teacher::create($validated);

            return redirect()->route('admin.teachers.index')
                ->with('success', 'Teacher created successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred while creating the teacher: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified teacher.
     */
    public function show($id)
    {
        $teacher = Teacher::with('courses')->findOrFail($id);
        return view('admin.teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified teacher.
     */
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('admin.teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified teacher in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $teacher = Teacher::findOrFail($id);

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:teachers,email,' . $id,
                'phone' => 'nullable|string|max:50',
                'bio' => 'nullable|string',
                'specialization' => 'nullable|string|max:255',
                'qualification' => 'nullable|string|max:255',
                'experience_years' => 'nullable|integer|min:0|max:99',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'status' => 'required|in:active,inactive',
            ]);

            if ($request->hasFile('image')) {
                if ($teacher->image) {
                    Storage::disk('public')->delete($teacher->image);
                }
                $imageName = time() . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
                $imagePath = $request->file('image')->storeAs('teachers', $imageName, 'public');
                $validated['image'] = $imagePath;
            }

            $validated['social_links'] = $this->buildSocialLinks($request);

            $teacher->update($validated);

            return redirect()->route('admin.teachers.index')
                ->with('success', 'Teacher updated successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred while updating the teacher: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified teacher from storage.
     */
    public function destroy($id)
    {
        try {
            $teacher = Teacher::findOrFail($id);
            if ($teacher->image) {
                Storage::disk('public')->delete($teacher->image);
            }
            $teacher->delete();

            return redirect()->route('admin.teachers.index')
                ->with('success', 'Teacher deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.teachers.index')
                ->with('error', 'An error occurred while deleting the teacher: ' . $e->getMessage());
        }
    }

    /**
     * Build social_links array from request.
     */
    private function buildSocialLinks(Request $request): array
    {
        $links = [];
        if ($request->filled('social_facebook')) {
            $links['facebook'] = $request->social_facebook;
        }
        if ($request->filled('social_linkedin')) {
            $links['linkedin'] = $request->social_linkedin;
        }
        if ($request->filled('social_twitter')) {
            $links['twitter'] = $request->social_twitter;
        }
        if ($request->filled('social_instagram')) {
            $links['instagram'] = $request->social_instagram;
        }
        return $links;
    }
}
