<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobFormData;
use App\Models\JobForm;
use Illuminate\Http\Request;

class AdminJobFormDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = JobFormData::with('jobForm');
        
        // Filter by job_form_id if provided
        if ($request->has('job_form_id')) {
            $query->where('job_form_id', $request->job_form_id);
        }
        
        $jobFormData = $query->orderBy('job_form_id')->orderBy('order')->get();
        $jobForms = JobForm::all();
        
        return view('admin.job-form-data.index', compact('jobFormData', 'jobForms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $jobFormId = $request->query('job_form_id');
        $jobForms = JobForm::all();
        return view('admin.job-form-data.create', compact('jobForms', 'jobFormId'));
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
                'job_form_id' => 'required|exists:job_forms,id',
                'type' => 'required|in:image,text',
                'title' => 'required|string|max:255',
                'is_required' => 'nullable|boolean',
                'order' => 'nullable|integer|min:0',
            ]);

            $validated['is_required'] = $request->has('is_required') ? true : false;
            $validated['order'] = $validated['order'] ?? 0;

            JobFormData::create($validated);

            return redirect()->route('admin.job-form-data.index', ['job_form_id' => $validated['job_form_id']])
                ->with('success', 'Form field created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred while creating the form field: ' . $e->getMessage())
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
        $jobFormData = JobFormData::with('jobForm')->findOrFail($id);
        return view('admin.job-form-data.show', compact('jobFormData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobFormData = JobFormData::findOrFail($id);
        $jobForms = JobForm::all();
        return view('admin.job-form-data.edit', compact('jobFormData', 'jobForms'));
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
            $jobFormData = JobFormData::findOrFail($id);

            $validated = $request->validate([
                'job_form_id' => 'required|exists:job_forms,id',
                'type' => 'required|in:image,text',
                'title' => 'required|string|max:255',
                'is_required' => 'nullable|boolean',
                'order' => 'nullable|integer|min:0',
            ]);

            $validated['is_required'] = $request->has('is_required') ? true : false;
            $validated['order'] = $validated['order'] ?? 0;

            $jobFormData->update($validated);

            return redirect()->route('admin.job-form-data.index', ['job_form_id' => $validated['job_form_id']])
                ->with('success', 'Form field updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred while updating the form field: ' . $e->getMessage())
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
            $jobFormData = JobFormData::findOrFail($id);
            $jobFormId = $jobFormData->job_form_id;
            $jobFormData->delete();

            return redirect()->route('admin.job-form-data.index', ['job_form_id' => $jobFormId])
                ->with('success', 'Form field deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.job-form-data.index')
                ->with('error', 'An error occurred while deleting the form field: ' . $e->getMessage());
        }
    }
}
