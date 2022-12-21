<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    use HasFactory;
    protected $fillable = [
        'offer_code',
        'restuarant_name',
        'description',
        'expiry_date',
        'logo',
        'status',
        'no_expiry'
    ];
}
