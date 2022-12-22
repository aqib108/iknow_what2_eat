<?php

namespace App\Repositories\Api;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model
use App\Models\Api\Country;
use App\Http\Resources\Api\CountryResource;




/**
 * Class CountryRepository.
 */
class CountryRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        //return YourModel::class;
        return Country::class;
    }
    public function countryCode($request){
        $data = Country::select('id','name','phonecode')->get();
        return CountryResource::collection($data);
    }
}
