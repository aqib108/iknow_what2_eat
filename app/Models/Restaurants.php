<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Categories;
use App\Models\ResturantCuisiones;
class Restaurants extends Model
{
    use HasFactory;
    protected $table ='restaurants';
    protected $fillable = [
        'title_en',
        'title_ar',
        'price_en',
        'price_ar',
        'new_in_town',
        'additional_price_en',
        'additional_price_ar',
        'phone',
        'insta_handle',
        'res_description_en',
        'res_description_ar',
        'meat_poultry_source_en',
        'meat_poultry_source_ar',
        'social_sites',
        'status',
        'phone_country_code'
    ];
    function categories(){
        return $this->belongsToMany(Categories::class);
    }
    public function resturant_cuisines()
    {
            return $this->belongsToMany(ResturantCuisiones::class, 'employee_section_library_albums');
    }
}
