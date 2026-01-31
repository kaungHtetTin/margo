<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobFormData extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'job_form_data';

    protected $fillable = [
        'job_form_id',
        'type',
        'title',
        'is_required',
        'order',
    ];

    protected $casts = [
        'is_required' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Get the job form that owns this form data.
     */
    public function jobForm()
    {
        return $this->belongsTo(JobForm::class, 'job_form_id');
    }
}
