<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Cache;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description', 'icon'
    ];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Automatically clear header_categories cache on save/delete
    protected static function booted()
    {
        static::saved(function ($category) {
            Cache::forget('header_categories');
        });

        static::deleted(function ($category) {
            Cache::forget('header_categories');
        });
    }
}
