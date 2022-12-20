<?php

namespace App\Repositories\Api;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model
use App\Models\Api\AboutMe;
use App\Http\Resources\Api\AboutResource;

/**
 * Class AboutRepository.
 */
class AboutRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        //return YourModel::class;
        return AboutME::class;
    }
    public function about($request){
        $data = AboutMe::all();
        return AboutResource::collection($data);
    }


}
