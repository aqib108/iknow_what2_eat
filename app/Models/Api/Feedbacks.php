<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedbacks extends Model
{
    use HasFactory;
    protected $fillable = [
        'note',
        'name',
        'status',
        'message'
    ];
}
