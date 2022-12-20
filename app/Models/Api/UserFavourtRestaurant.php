<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavourtRestaurant extends Model
{
    use HasFactory;
    protected $fillable = [
        'is_favourt',
        'user_id',
        'restaurant_id',
    ];

}
