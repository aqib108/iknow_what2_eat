<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Api\AboutRepository;

class AboutController extends BaseController
{
    protected $CategoryRepository;
    public function __construct(AboutRepository $AboutRepository)
    {
       $this->AboutRepository = $AboutRepository;
    }
    public function about(Request $request){
        $data = $this->AboutRepository->about($request);
        return $this->sendResponse($data,'About me added successfully');
    }
}
