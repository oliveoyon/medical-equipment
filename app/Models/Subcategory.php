<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Cache;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'name', 'slug', 'description'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Automatically clear header_categories cache on save/delete
    protected static function booted()
    {
        static::saved(function ($subcategory) {
            Cache::forget('header_categories');
        });

        static::deleted(function ($subcategory) {
            Cache::forget('header_categories');
        });
    }
}
