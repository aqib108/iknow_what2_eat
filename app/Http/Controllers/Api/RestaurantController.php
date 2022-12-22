<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Api\RestaurantRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Api\TopItemListRequest;

class RestaurantController extends BaseController
{
    protected $RestaurantRepository;
    public function __construct(RestaurantRepository $RestaurantRepository)
    {
       $this->RestaurantRepository = $RestaurantRepository;
    }
    public function topItemsList(TopItemListRequest $request){
        $data = $this->RestaurantRepository->topItemsList($request);
        return $this->sendResponse($data,'Top Items List generated successfully');
    }
    public function restaurantDetail(Request $request){
        $data = $this->RestaurantRepository->restaurantDetail($request);
        return $this->sendResponse($data,'Restaurant Detail generated successfully');
    }

}
