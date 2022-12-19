<?php

namespace App\Repositories\Api;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model
use App\Models\Api\Category;
use App\Http\Resources\Api\CategoryListResource;
/**
 * Class CategoryRepository.
 */
class CategoryRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        //return YourModel::class;
        return Category::class;
    }
    public function categoryList($request){
        $data = Category::all();
        foreach ($data as $data){
            return new CategoryListResource($data);
        }


    }
}
