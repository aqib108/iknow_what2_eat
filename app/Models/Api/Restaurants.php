<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurants extends Model
{
    use HasFactory;
    protected $fillable = [
        'new_in_town',
        'title_en',
        'price_en'


    ];
    public function user()
    {
        return $this->belongsToMany(User::class, 'user_favourt_restaurants', 'restaurant_id', 'user_id');
    }
    public function restaurantPhotos()
    {
        return $this->hasMany(RestaurantPhoto::class, 'restaurant_id', 'id');
    }
    public function restaurantLocations()
    {
        return $this->hasMany(RestaurantLocation::class, 'restaurant_id', 'id');
    }

}
