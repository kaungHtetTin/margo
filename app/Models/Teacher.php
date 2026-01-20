<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'bio',
        'specialization',
        'qualification',
        'experience_years',
        'image',
        'social_links',
        'status',
    ];

    protected $casts = [
        'social_links' => 'array',
    ];

    /**
     * Get the courses for the teacher.
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    /**
     * Get active courses for the teacher.
     */
    public function activeCourses()
    {
        return $this->hasMany(Course::class)->where('status', 'active');
    }
}
