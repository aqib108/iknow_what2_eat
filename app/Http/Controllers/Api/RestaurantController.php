<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Api\RestaurantRepository;
use Illuminate\Http\Request;


class RestaurantController extends BaseController
{
    protected $RestaurantRepository;
    public function __construct(RestaurantRepository $RestaurantRepository)
    {
       $this->RestaurantRepository = $RestaurantRepository;
    }
    public function restaurantDetail(Request $request){
        $data = $this->RestaurantRepository->restaurantDetail($request);
        return $this->sendResponse($data,'Restaurant Detail generated successfully');
    }
    public function allRestaurants(Request $request){
        $data = $this->RestaurantRepository->allRestaurants($request);
        return $this->sendResponse($data,'All Restaurants generated successfully');
    }
    

}
