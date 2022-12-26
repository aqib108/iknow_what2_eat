<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantFavourtie extends Model
{
    use HasFactory;
    protected $fillable = [
       'item_name_en',
       'item_price',
       'image',
       'restaurant_id',


    ];
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id', 'id');
    }

}
