<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural form of the model name
    protected $table = 'blogs';

    // Specify the fillable fields
    protected $fillable = [
        'name',
        'banner',
        'short_description',
        'description',
        'status',
        'slug',
        'image_alt',
        'meta_title',
        'meta_description',
        'keywords',
    ];
}
