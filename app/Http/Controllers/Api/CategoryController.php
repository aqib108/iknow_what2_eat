<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Api\CategoryRepository;

class CategoryController extends BaseController
{
    protected $CategoryRepository;
    public function __construct(CategoryRepository $CategoryRepository)
    {
       $this->CategoryRepository = $CategoryRepository;
    }
    public function categoryList(Request $request){
        $data = $this->CategoryRepository->categoryList($request);
        return $this->sendResponse($data,'Category List generated successfully');
    }
}
