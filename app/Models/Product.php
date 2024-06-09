<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tags' => 'array',
        'sizes' => 'array',
        'colors' => 'array',
    ];

    /**
     * Get the gallery for the product post.
     */
    public function gallery(): HasMany
    {
        return $this->hasMany(PhotoGallery::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
