<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\TopItemListRequest;
use App\Repositories\Api\RestaurantFavouriteRepository;

class RestaurantFavourtieController extends BaseController
{
    protected $RestaurantFavouriteRepository;
    public function __construct(RestaurantFavouriteRepository $RestaurantFavouriteRepository)
    {
       $this->RestaurantFavouriteRepository = $RestaurantFavouriteRepository;
    }
    public function topItemsList(TopItemListRequest $request){
        $data = $this->RestaurantFavouriteRepository->topItemsList($request);
        return $this->sendResponse($data,'Top Items List generated successfully');
    }
}
