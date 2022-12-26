<?php

namespace App\Repositories\Api;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model
use App\Models\Api\RestaurantFavourtie;
use App\Http\Resources\Api\TopItemListResource;


/**
 * Class RestaurantFavouriteRepository.
 */
class RestaurantFavouriteRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        //return YourModel::class;
        return RestaurantFavourtie::class;
    }
    public function topItemsList($request){
        $data=RestaurantFavourtie::all();
        return TopItemListResource::collection($data);

    }
}
