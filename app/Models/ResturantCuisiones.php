<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurants;
class ResturantCuisiones extends Model
{
    use HasFactory;
    protected $table ='restaurant_cuisines';
    protected $fillable = [
        'cuisine_id',
        'restaurant_id'
    ];
    public function resturant_cuisines()
    {
        return $this->belongsToMany(Restaurants::class);
    }

}
