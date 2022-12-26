<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaboration extends Model
{
    use HasFactory;

    public function restaurantCollaboration()
    {
        return $this->belongsToMany(RestaurantCollaboration::class, 'collaboration_id', 'id');
    }
}

