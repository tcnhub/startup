<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'status',
        'published_at',
        'admin_id',
        'is_featured',
        'allow_comments',
    ];

    protected $casts = [
        'published_at'   => 'datetime',
        'is_featured'    => 'boolean',
        'allow_comments' => 'boolean',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
