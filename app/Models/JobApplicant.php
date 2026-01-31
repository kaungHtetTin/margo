<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobApplicant extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'phone',
        'emails',
    ];

    /**
     * Get the job applications for this applicant.
     */
    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class, 'job_applicant_id');
    }
}
