<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuisines extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en',
        'name_ar',
        'image'
    ];
    public function resturant_cuisines()
    {
        return $this->belongsToMany(Restaurants::class);
    }
}
