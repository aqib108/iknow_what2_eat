<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'type',
        'country',
        'social_name',
        'description',
    ];
}
