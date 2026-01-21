<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'body_images',
        'featured_image',
        'author_id',
        'category',
        'tags',
        'meta_title',
        'meta_description',
        'views',
        'status',
        'published_at',
    ];

    protected $casts = [
        'body_images' => 'array',
        'tags' => 'array',
        'published_at' => 'datetime',
        'views' => 'integer',
    ];

    /**
     * Get the author that owns the blog.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Scope a query to only include published blogs.
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published')
            ->where(function($q) {
                $q->whereNull('published_at')
                  ->orWhere('published_at', '<=', now());
            });
    }

    /**
     * Scope a query to only include draft blogs.
     */
    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    /**
     * Scope a query to only include archived blogs.
     */
    public function scopeArchived($query)
    {
        return $query->where('status', 'archived');
    }

}
