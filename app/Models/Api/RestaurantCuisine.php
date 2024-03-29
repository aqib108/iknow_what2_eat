<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\Restaurants;
class RestaurantCuisine extends Model
{
    use HasFactory;
    public function restaurant()
    {
        return $this->belongsTo(Restaurants::class, 'restaurant_id', 'id');
    }
    public function cuisine()
    {
        return $this->belongsToMany(Cuisine::class, 'cuisine_id', 'id');
    }
}
