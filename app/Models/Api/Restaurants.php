<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\RestaurantAmenty;

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
    public function restaurantAmenity()
    {
        return $this->hasMany(RestaurantAmenty::class, 'restaurant_id', 'id');
    }
    public function restaurantCategory()
    {
        return $this->hasMany(RestaurantCategory::class, 'restaurant_id', 'id');
    }
    public function restaurantCollaboration()
    {
        return $this->hasMany(RestaurantCollaboration::class, 'restaurant_id', 'id');
    }
    public function restaurantCuisine()
    {
        return $this->hasMany(RestaurantCuisine::class, 'restaurant_id', 'id');
    }
    public function restaurantDeliveriesOption()
    {
        return $this->hasMany(RestaurantDeliveriesOption::class, 'restaurant_id', 'id');
    }
    public function restaurantMenu()
    {
        return $this->hasMany(RestaurantMenu::class, 'restaurant_id', 'id');
    }
    public function restaurantTiming()
    {
        return $this->hasMany(RestaurantTiming::class, 'restaurant_id', 'id');
    }
    public function restaurantFavourtie()
    {
        return $this->hasMany(RestaurantFavourtie::class, 'restaurant_id', 'id');
    }
    public function restaurantFoodsTruck()
    {
        return $this->hasMany(RestaurantFoodsTruck::class, 'restaurant_id', 'id');
    }

}
