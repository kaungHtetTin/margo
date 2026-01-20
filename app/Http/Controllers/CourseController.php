<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of available courses with teachers.
     */
    public function index()
    {
        $courses = Course::with('teacher')
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('courses', compact('courses'));
    }

    /**
     * Display the specified course with teacher details.
     */
    public function show($id)
    {
        $course = Course::with('teacher')
            ->where('id', $id)
            ->where('status', 'active')
            ->firstOrFail();

        return view('course-detail', compact('course'));
    }
}
