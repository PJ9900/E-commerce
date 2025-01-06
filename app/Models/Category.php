<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Specify the table name if it differs from the default
    protected $table = 'categories';

    // Define the primary key (optional if it is 'id')
    protected $primaryKey = 'tcat_id';

    // Specify the fields that can be mass-assigned
    protected $fillable = [
        'tcat_name',
        'banner',
        'cbanner',
        'cimage',
        'lcat_id',
        'mcat_id',
        'content',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'show_on_menu',
        'slug',
        'content_add',
    ];

    // Optionally, if you're using timestamps for created_at and updated_at
    public $timestamps = true;
}
