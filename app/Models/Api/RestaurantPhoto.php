<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantPhoto extends Model
{
    use HasFactory;
    public function restaurant()
    {
        return $this->belongsTo(Restaurants::class, 'restaurant_id', 'id' );
    }

}
