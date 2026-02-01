<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_postings';

    protected $fillable = [
        'title',
        'company',
        'location',
        'salary',
        'description',
        'status',
        'posted_at',
    ];

    protected $casts = [
        'posted_at' => 'date',
    ];

    /**
     * Scope a query to only include active jobs.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
