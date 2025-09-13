<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDocument extends Model
{
    use HasFactory;

    // Allow mass assignment
    protected $fillable = [
        'product_id',
        'file',      // path to the document
        'title',     // optional title
    ];

    // Relationship to Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
