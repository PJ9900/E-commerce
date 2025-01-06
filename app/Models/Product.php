<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'p_name',
        'p_sku',
        'variant',
        'category_id',
        'p_featured_photo',
        'p_description',
        'p_short_description',
        'p_long_description',
        'additional_info',
        'p_is_featured',
        'p_is_active',
        'top_id',
        'slug',
    ];
}
