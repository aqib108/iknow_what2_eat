<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;
class Categories extends Model
{
    protected $table = 'categories';
    use HasFactory;
    protected $fillable = [
        'name_en',
        'name_ar',
        'status',
        'icon',
        'custom_icon',
    ];
    

}
