<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'teacher_id',
        'duration',
        'day',
        'time',
        'price',
        'level',
        'image',
        'curriculum',
        'max_students',
        'current_students',
        'start_date',
        'end_date',
        'status',
        'is_open',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
        'curriculum' => 'array',
        'is_open' => 'boolean',
    ];

    /**
     * Get the teacher that owns the course.
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    /**
     * Scope a query to only include active courses.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope a query to only include upcoming courses.
     */
    public function scopeUpcoming($query)
    {
        return $query->where('status', 'upcoming');
    }
}
