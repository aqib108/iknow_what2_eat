<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\Restaurants;
use App\Models\Api\Amenty;

class RestaurantAmenty extends Model
{
    use HasFactory;
    protected $table = 'restaurant_amenities';
    public function restaurant()
    {
        return $this->belongsTo(Restaurants::class, 'restaurant_id', 'id');
    }
    public function amenty()
    {
        return $this->belongsToMany(Amenty::class, 'amenity_id', 'id');
    }


}
