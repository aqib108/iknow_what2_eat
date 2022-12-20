<?php

namespace App\Repositories\Api;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model
use App\Models\Api\UserFavourtRestaurant;
use App\Http\Resources\Api\UserFavourtRestaurantResource;
use App\Http\Resources\Api\UserFavourtRestaurantListResource;

/**
 * Class FavourtRepository.
 */
class FavourtRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        //return YourModel::class;
        return UserFavourtRestaurant::class;
    }
    public function makeFavourt($request){
        $data['is_favourt'] = true;
        $data['status'] = 1;
        $data['restaurant_id'] = $request->restaurantID;
        $data['user_id'] = auth()->user()->id;
        if($this->where('user_id',$data['user_id'])->where('restaurant_id',$data['restaurant_id'])->count() > 0)
        {
            $this->where('user_id',$data['user_id'])->where('restaurant_id',$data['restaurant_id'])->delete($data);
            $response['is_favourt'] = false;
            return new UserFavourtRestaurantResource ($response);
        }
        else{
               $response = $this->create($data);
               $response['is_favourt'] = true;
                return new UserFavourtRestaurantResource ($response);

        }
    }
    public function favouriteList($request){
        $data= auth()->user()->favourtRestaurants()->where('is_favourt',1)->get();
        foreach($data as $data){
            return new UserFavourtRestaurantListResource($data);

        }

    }
}
