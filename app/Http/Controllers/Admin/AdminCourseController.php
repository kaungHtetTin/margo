<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class AdminCourseController extends Controller
{
    /**
     * Display a listing of courses.
     */
    public function index()
    {
        $courses = Course::orderBy('created_at', 'desc')->get();
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new course.
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created course in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'duration' => 'nullable|string|max:255',
                'day' => 'nullable|string|max:255',
                'time' => 'nullable|string|max:255',
                'level' => 'required|in:beginner,intermediate,advanced',
                'is_open' => 'nullable',
            ]);

            $validated['teacher_id'] = null;
            $validated['status'] = 'active';
            $validated['is_open'] = $request->boolean('is_open');

            Course::create($validated);

            return redirect()->route('admin.courses.index')
                ->with('success', 'Course created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred while creating the course: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified course.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified course.
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.courses.edit', compact('course'));
    }

    /**
     * Update the specified course in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $course = Course::findOrFail($id);

            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'duration' => 'nullable|string|max:255',
                'day' => 'nullable|string|max:255',
                'time' => 'nullable|string|max:255',
                'level' => 'required|in:beginner,intermediate,advanced',
                'is_open' => 'nullable',
            ]);

            $validated['is_open'] = $request->boolean('is_open');
            $course->update($validated);

            return redirect()->route('admin.courses.index')
                ->with('success', 'Course updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred while updating the course: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified course from storage.
     */
    public function destroy($id)
    {
        try {
            $course = Course::findOrFail($id);
            $course->delete();

            return redirect()->route('admin.courses.index')
                ->with('success', 'Course deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.courses.index')
                ->with('error', 'An error occurred while deleting the course: ' . $e->getMessage());
        }
    }
}
