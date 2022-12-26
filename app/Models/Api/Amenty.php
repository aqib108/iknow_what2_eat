<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\RestaurantAmenty;

class Amenty extends Model
{
    use HasFactory;
    public function restaurantAmenty()
    {
        return $this->belongsToMany(RestaurantAmenty::class, 'amenity_id', 'id');
    }
}
