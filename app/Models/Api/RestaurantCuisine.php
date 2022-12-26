<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantCuisine extends Model
{
    use HasFactory;
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id', 'id');
    }
    public function cuisine()
    {
        return $this->belongsTo(Cuisine::class, 'cuisine_id', 'id');
    }
}
