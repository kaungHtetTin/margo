<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplicant;
use Illuminate\Http\Request;

class AdminApplicationController extends Controller
{
    /**
     * Display a listing of job applications (applicants).
     */
    public function index()
    {
        $applicants = JobApplicant::with(['jobApplications.jobForm', 'jobApplications.jobFormData'])
            ->latest()
            ->get();

        return view('admin.applications.index', compact('applicants'));
    }

    /**
     * Display the specified application (applicant with form responses).
     */
    public function show($id)
    {
        $applicant = JobApplicant::with(['jobApplications.jobForm', 'jobApplications.jobFormData'])
            ->findOrFail($id);

        $jobForm = $applicant->jobApplications->first()?->jobForm;
        $applications = $applicant->jobApplications->sortBy(function ($app) {
            return $app->jobFormData->order ?? 0;
        });

        return view('admin.applications.show', compact('applicant', 'jobForm', 'applications'));
    }

    /**
     * Update the application status (approve/reject).
     */
    public function update(Request $request, $id)
    {
        $applicant = JobApplicant::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $applicant->update($validated);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true, 'status' => $applicant->status]);
        }

        return redirect()->route('admin.applications.show', $id)
            ->with('success', 'Application status updated successfully.');
    }

    /**
     * Remove the specified application (applicant and all their form responses).
     */
    public function destroy($id)
    {
        try {
            $applicant = JobApplicant::findOrFail($id);
            $applicant->delete();

            return redirect()->route('admin.applications.index')
                ->with('success', 'Application deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.applications.index')
                ->with('error', 'An error occurred while deleting the application: ' . $e->getMessage());
        }
    }
}
