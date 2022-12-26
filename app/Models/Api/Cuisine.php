<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuisine extends Model
{
    use HasFactory;
    protected $fillable = [
       'name_en',
       'image',
       'status',
    ];
    public function restaurantCuisine()
    {
        return $this->belongsToMany(RestaurantCuisine::class, 'cuisine_id', 'id');
    }



}
