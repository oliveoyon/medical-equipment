<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'brand_id',
        'name',
        'slug',
        'model',
        'description',
        'specifications',
        'sizes',
        'colors',
        'status',
    ];

    // Cast JSON fields to array automatically

    // Relations
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function subcategory() {
        return $this->belongsTo(Subcategory::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function images() {
        return $this->hasMany(ProductImage::class);
    }

    public function documents() {
        return $this->hasMany(ProductDocument::class);
    }

    public function sizes() {
        return $this->belongsToMany(Size::class, 'product_sizes', 'product_id', 'size_id');
    }

    public function colors() {
        return $this->belongsToMany(Color::class, 'product_colors', 'product_id', 'color_id');
    }
}
