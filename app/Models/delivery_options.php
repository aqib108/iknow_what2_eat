<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class delivery_options extends Model
{
    use HasFactory;
    protected $table = 'delivery_options';
    protected $fillable = [
        'name_en',
        'name_ar',
        'logo'
    ];
}
