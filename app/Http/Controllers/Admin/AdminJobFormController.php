<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobForm;
use Illuminate\Http\Request;

class AdminJobFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobForms = JobForm::with('formData')->latest()->get();
        return view('admin.job-forms.index', compact('jobForms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.job-forms.create');
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
                'description' => 'nullable|string',
                'status' => 'required|in:draft,active,inactive',
                'is_active' => 'nullable|boolean',
            ]);

            $validated['is_active'] = $request->has('is_active') ? true : false;

            JobForm::create($validated);

            return redirect()->route('admin.job-forms.index')
                ->with('success', 'Job form created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred while creating the job form: ' . $e->getMessage())
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
        $jobForm = JobForm::with('formData')->findOrFail($id);
        return view('admin.job-forms.show', compact('jobForm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobForm = JobForm::findOrFail($id);
        return view('admin.job-forms.edit', compact('jobForm'));
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
            $jobForm = JobForm::findOrFail($id);

            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'status' => 'required|in:draft,active,inactive',
                'is_active' => 'nullable|boolean',
            ]);

            $validated['is_active'] = $request->has('is_active') ? true : false;

            $jobForm->update($validated);

            return redirect()->route('admin.job-forms.index')
                ->with('success', 'Job form updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred while updating the job form: ' . $e->getMessage())
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
            $jobForm = JobForm::findOrFail($id);
            $jobForm->delete();

            return redirect()->route('admin.job-forms.index')
                ->with('success', 'Job form deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.job-forms.index')
                ->with('error', 'An error occurred while deleting the job form: ' . $e->getMessage());
        }
    }
}
