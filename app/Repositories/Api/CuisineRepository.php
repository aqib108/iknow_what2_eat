<?php

namespace App\Repositories\Api;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model
use App\Models\Api\Cuisine;
use App\Http\Resources\Api\CuisineListResource;

/**
 * Class CuisineRepository.
 */
class CuisineRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        //return YourModel::class;
        return Cuisine::class;
    }
    public function cuisineList($request)
    {
        $data = Cuisine::all();
        return CuisineListResource::collection($data);
}
}
