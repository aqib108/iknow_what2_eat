<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurants extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsToMany(User::class, 'user_favourt_restaurants', 'restaurant_id', 'user_id');
    }
}
