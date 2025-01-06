<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    // Define the table if it's not the default 'banners' name
    protected $table = 'banners';

    // Specify the fields that can be mass-assigned
    protected $fillable = [
        'title',
        'page_name',
        'banners',
        'mbanner',
        'large_banner'
    ];

    // Optionally, you can define the timestamps if they are not standard
    public $timestamps = true;
}
