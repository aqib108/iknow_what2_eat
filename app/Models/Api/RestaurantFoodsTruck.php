<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\Restaurants;

class RestaurantFoodsTruck extends Model
{
    use HasFactory;
    protected $table='restaurant_foods_truck';
    public function restaurant(){
        return $this->belongsTo(Restaurants::class,'restaurant_id','id');
    }
}
