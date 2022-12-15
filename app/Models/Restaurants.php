<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Categories;
class Restaurants extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'message',
        'notification_link_to',
        'status'
    ];
    function categories(){
        return $this->belongsToMany(Categories::class);
    }
}
