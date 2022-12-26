<?php

namespace App\Repositories\Api;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model
use App\Models\Api\Restaurants;
use App\Http\Resources\Api\RestaurantListResource;
use App\Http\Resources\Api\RestaurantDetailResource;

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
    public function restaurantDetail($request){
        $data=Restaurants::wherestatus('Active')->with(['restaurantPhotos','restaurantLocations','restaurantCuisine','restaurantTiming','restaurantMenu','restaurantAmenity','restaurantFavourtie','restaurantCollaboration'])->whereid($request->restaurantID)->first();
        return new RestaurantDetailResource($data);
    }
    public function allRestaurants($request){
        $data=Restaurants::wherestatus('Active')->with(['restaurantPhotos','restaurantLocations'])->get();
        // return response()->json($data);
        return RestaurantListResource::collection($data);

    }
}
