<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutMe extends Model
{
    use HasFactory;
    protected $fillable = [
        'insta_url',
        'snapchat_url',
        'tiktok_url',
        'youtube_url',
        'stay_social_en',
        'about_me_en',
    ];
}
