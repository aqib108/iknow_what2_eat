<?php

namespace App\Repositories\Api;

use App\Models\Api\Reviews;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model
use App\Http\Resources\Api\ReviewResource;

/**
 * Class ReviewRepository.
 */
class ReviewRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */

    public function model()
    {
        return Reviews::class;
        //return YourModel::class;
    }
    public function review($request){
        $data = [
            'name' => $request->fullName,
            'phone' => $request->phoneNumber,
            'type' => $request->reviewChoice,
            'country' => $request->country,
            'social_name' => $request->socialMedia,
            'description' => $request->note,
        ];
        $review = Reviews::create($data);
        $ReviewResponse =  new ReviewResource($review);
            return $ReviewResponse;

    }
}
