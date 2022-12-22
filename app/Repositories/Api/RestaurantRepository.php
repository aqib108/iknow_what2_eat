<?php

namespace App\Repositories\Api;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model
use App\Models\Api\Restaurants;
use App\Http\Resources\Api\TopItemListResource;

/**
 * Class RestaurantRepository.
 */
class RestaurantRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        //return YourModel::class;
        return Restaurants::class;
    }
    public function topItemsList($request){
        dd('Top item list');
    }
    public function restaurantDetail($request){
        dd('Restaurant detail');
    }
}
