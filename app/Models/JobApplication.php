<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_applicant_id',
        'job_form_id',
        'job_form_data_id',
        'value',
    ];

    /**
     * Get the job applicant that owns this application.
     */
    public function jobApplicant()
    {
        return $this->belongsTo(JobApplicant::class, 'job_applicant_id');
    }

    /**
     * Get the job form for this application.
     */
    public function jobForm()
    {
        return $this->belongsTo(JobForm::class, 'job_form_id');
    }

    /**
     * Get the job form data field for this application.
     */
    public function jobFormData()
    {
        return $this->belongsTo(JobFormData::class, 'job_form_data_id');
    }
}
