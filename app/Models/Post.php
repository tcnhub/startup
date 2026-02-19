<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'content', 'excerpt', 'status',
        'published_at', 'admin_id', 'is_featured', 'allow_comments',
        'author_type', 'author_id',
        'meta_title', 'meta_description', 'og_image',
        'blog_category_id', 'featured_image_id', 'destination_id',
        'views_count', 'likes_count', 'reading_time',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_featured'  => 'boolean',
        'allow_comments' => 'boolean',
    ];

    public function author(): MorphTo
    {
        return $this->morphTo();
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }
}
