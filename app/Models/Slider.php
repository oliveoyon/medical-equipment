<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    // Fillable fields for mass assignment
    protected $fillable = [
        'title_h5',
        'title_h1',
        'description',
        'button_url',
        'image',
        'status',
    ];
}
