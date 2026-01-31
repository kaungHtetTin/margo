<?php

namespace App\Http\Controllers;

use App\Models\JobForm;
use App\Models\JobApplicant;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of active job forms.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobForms = JobForm::active()
            ->with('formData')
            ->latest()
            ->get();
        
        return view('job-forms', compact('jobForms'));
    }

    /**
     * Show the application form for a specific job form.
     *
     * @param  string  $locale
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($locale = null, $id)
    {
        $jobForm = JobForm::with(['formData' => function($query) {
            $query->orderBy('order');
        }])->findOrFail($id);

        // Check if form is active
        if (!$jobForm->is_active || $jobForm->status !== 'active') {
            abort(404, 'This job form is not available.');
        }

        return view('job-apply', compact('jobForm'));
    }

    /**
     * Store a new job application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $locale
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $locale = null, $id)
    {
        try {
            $jobForm = JobForm::with('formData')->findOrFail($id);

            // Check if form is active
            if (!$jobForm->is_active || $jobForm->status !== 'active') {
                return redirect()->back()
                    ->with('error', 'This job form is not available.')
                    ->withInput();
            }

            // Build validation rules
            $rules = [
                'name' => 'required|string|max:255',
                'phone' => 'nullable|string|max:50',
                'emails' => 'nullable|string|max:500',
            ];

            $messages = [];

            // Add validation rules for form fields
            $formData = $jobForm->formData;
            foreach ($formData as $field) {
                $fieldName = 'field_' . $field->id;
                
                if ($field->type === 'image') {
                    if ($field->is_required) {
                        $rules[$fieldName] = 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120';
                    } else {
                        $rules[$fieldName] = 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120';
                    }
                    $messages[$fieldName . '.required'] = 'The ' . $field->title . ' image is required.';
                    $messages[$fieldName . '.image'] = 'The ' . $field->title . ' must be an image.';
                    $messages[$fieldName . '.mimes'] = 'The ' . $field->title . ' must be a file of type: jpeg, png, jpg, gif, webp.';
                    $messages[$fieldName . '.max'] = 'The ' . $field->title . ' may not be greater than 5MB.';
                } else {
                    if ($field->is_required) {
                        $rules[$fieldName] = 'required|string';
                    } else {
                        $rules[$fieldName] = 'nullable|string';
                    }
                    $messages[$fieldName . '.required'] = 'The ' . $field->title . ' field is required.';
                }
            }

            // Validate all inputs
            $validated = $request->validate($rules, $messages);

            // Create applicant
            $applicant = JobApplicant::create([
                'name' => $validated['name'],
                'phone' => $validated['phone'] ?? null,
                'emails' => $validated['emails'] ?? null,
            ]);

            // Store form field responses
            foreach ($formData as $field) {
                $fieldName = 'field_' . $field->id;
                $value = null;

                if ($field->type === 'image') {
                    // Handle image upload
                    if ($request->hasFile($fieldName)) {
                        $image = $request->file($fieldName);
                        $imageName = time() . '_' . uniqid() . '_' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
                        $imagePath = $image->storeAs('job-applications', $imageName, 'public');
                        $value = $imagePath;
                    }
                } else {
                    // Handle text input
                    $value = $validated[$fieldName] ?? null;
                }

                // Create application record for this field if value exists
                if ($value !== null) {
                    JobApplication::create([
                        'job_applicant_id' => $applicant->id,
                        'job_form_id' => $jobForm->id,
                        'job_form_data_id' => $field->id,
                        'value' => $value,
                    ]);
                }
            }

            $locale = $locale ?? app()->getLocale();
            return redirect(localized_route('job-forms.apply.success', ['id' => $id], $locale))
                ->with('success', 'Your application has been submitted successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred while submitting your application: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show success page after application submission.
     *
     * @param  string  $locale
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function success($locale = null, $id)
    {
        $jobForm = JobForm::findOrFail($id);
        return view('job-apply-success', compact('jobForm'));
    }

    /**
     * Show the search form for finding applications.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        return view('job-application-search');
    }

    /**
     * Search for applications by email or phone.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchResults(Request $request)
    {
        $request->validate([
            'email' => 'nullable|string|max:500',
            'phone' => 'nullable|string|max:50',
        ]);

        $searchTerm = trim($request->email ?? $request->phone ?? '');

        // At least one field must be provided
        if (empty($searchTerm)) {
            return redirect()->back()
                ->with('error', 'Please provide either an email address or phone number to search.')
                ->withInput();
        }

        $query = JobApplicant::with(['jobApplications.jobForm', 'jobApplications.jobFormData']);

        // Search both email and phone fields
        $query->where(function($q) use ($searchTerm) {
            // Search by email (check if emails field contains the search term)
            $q->where(function($emailQuery) use ($searchTerm) {
                $emailQuery->where('emails', 'LIKE', "%{$searchTerm}%")
                           ->orWhere('emails', 'LIKE', "%,{$searchTerm}%")
                           ->orWhere('emails', 'LIKE', "%{$searchTerm},%");
            })
            // Also search by phone
            ->orWhere('phone', 'LIKE', "%{$searchTerm}%");
        });

        $applicants = $query->latest()->get();

        // Group applications by applicant
        $groupedApplications = [];
        foreach ($applicants as $applicant) {
            $applicationsByForm = $applicant->jobApplications->groupBy('job_form_id');
            foreach ($applicationsByForm as $formId => $applications) {
                $jobForm = $applications->first()->jobForm;
                $groupedApplications[] = [
                    'applicant' => $applicant,
                    'jobForm' => $jobForm,
                    'applications' => $applications,
                    'submitted_at' => $applications->first()->created_at,
                ];
            }
        }

        // Sort by submission date (newest first)
        usort($groupedApplications, function($a, $b) {
            return $b['submitted_at'] <=> $a['submitted_at'];
        });

        $searchValue = $request->email ?? $request->phone ?? '';

        return view('job-application-results', [
            'groupedApplications' => $groupedApplications,
            'searchEmail' => strpos($searchValue, '@') !== false ? $searchValue : '',
            'searchPhone' => strpos($searchValue, '@') === false ? $searchValue : '',
        ]);
    }
}
