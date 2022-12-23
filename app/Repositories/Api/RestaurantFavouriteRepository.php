<?php

namespace App\Repositories\Api;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model
use App\Models\Api\RestaurantFavourite;

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
        return RestaurantFavourite::class;
    }
    public function topItemsList($request){
        dd('Top Items List');
    }
}
