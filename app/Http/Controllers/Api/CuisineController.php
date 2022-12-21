<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Api\CuisineRepository;

class CuisineController extends BaseController
{
    protected $CuisineRepository;
    public function __construct(CuisineRepository $CuisineRepository)
    {
       $this->CuisineRepository = $CuisineRepository;
    }
    public function cuisineList(Request $request)
    {
        $data = $this->CuisineRepository->cuisineList($request);
        return $this->sendResponse($data,'Cuisine List generated successfully');

    }
}
