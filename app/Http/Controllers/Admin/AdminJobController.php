<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class AdminJobController extends Controller
{
    /**
     * Display a listing of job postings.
     */
    public function index()
    {
        $jobs = Job::orderBy('created_at', 'desc')->get();
        return view('admin.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new job posting.
     */
    public function create()
    {
        return view('admin.jobs.create');
    }

    /**
     * Store a newly created job posting in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'company' => 'nullable|string|max:255',
                'location' => 'nullable|string|max:255',
                'salary' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'status' => 'required|in:active,pending,closed',
                'posted_at' => 'nullable|date',
            ]);

            if (empty($validated['posted_at']) && ($validated['status'] === 'active' || $validated['status'] === 'pending')) {
                $validated['posted_at'] = now();
            }

            Job::create($validated);

            return redirect()->route('admin.jobs.index')
                ->with('success', 'Job posted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred while creating the job: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified job posting.
     */
    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('admin.jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified job posting.
     */
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('admin.jobs.edit', compact('job'));
    }

    /**
     * Update the specified job posting in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $job = Job::findOrFail($id);

            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'company' => 'nullable|string|max:255',
                'location' => 'nullable|string|max:255',
                'salary' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'status' => 'required|in:active,pending,closed',
                'posted_at' => 'nullable|date',
            ]);

            $job->update($validated);

            return redirect()->route('admin.jobs.index')
                ->with('success', 'Job updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred while updating the job: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified job posting from storage.
     */
    public function destroy($id)
    {
        try {
            $job = Job::findOrFail($id);
            $job->delete();

            return redirect()->route('admin.jobs.index')
                ->with('success', 'Job deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.jobs.index')
                ->with('error', 'An error occurred while deleting the job: ' . $e->getMessage());
        }
    }
}
