<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Background extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image_url',
        'thumbnail_url',
        'width',
        'height',
        'color_theme',
        'background_opacity',
        'is_active',
        'user_profile_id',
        'is_vip',
        'is_default'
    ];
}
