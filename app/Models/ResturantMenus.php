<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Documents;
class ResturantMenus extends Model
{
    use HasFactory;
    protected $table = 'restaurant_menus';
    protected $fillable = ['name', 'link','restaurant_id','documents'];
    public function documents()
    {
        return $this->morphMany(Documents::class, 'documentable');
    }
}
