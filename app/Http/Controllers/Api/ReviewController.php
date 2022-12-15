<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\ReviewRequest;
use App\Repositories\Api\ReviewRepository;

class ReviewController extends BaseController
{
    protected $ReviewRepository;
    public function __construct(ReviewRepository $ReviewRepository)
    {
       $this->ReviewRepository = $ReviewRepository;
    }
   public function review(ReviewRequest $request){

    $data = $this->ReviewRepository->review($request);
    return $this->sendResponse($data,'Review Added Successfully');

   }
}
