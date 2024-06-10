<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PhotoGallery extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the product that owns the photo gallery.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

}
