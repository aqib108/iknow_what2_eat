<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Api\FavourtRepository;

class FavourtController extends BaseController
{
    protected $FavourtRepository;
    public function __construct(FavourtRepository $FavourtRepository)
    {
       $this->FavourtRepository = $FavourtRepository;
    }
    public function makeFavourt(Request $request){
        $data = $this->FavourtRepository->makeFavourt($request);
        return $this->sendResponse($data,'Make Favourt successfully');
    }
    public function favouriteList(Request $request){
        $data = $this->FavourtRepository->favouriteList($request);
        return $this->sendResponse($data,'Favourt List generated successfully');
    }
    
}
