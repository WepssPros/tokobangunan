<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductGallery extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'products_id', 'url', 'is_featured'
    ];

    public function product()
    {
        return $this->belongsTo(product::class, 'products_id', 'id');
    }
    public function getUrlAttribute($url)
    {
        return config('app.url') . Storage::url($url);
    }
}
