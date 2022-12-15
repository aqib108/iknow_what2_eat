<?php

namespace App\Repositories\Api;
use App\Models\Api\User;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Http\Resources\Api\FeedbackResource;
//use Your Model
use App\Models\Api\Feedbacks;
use Illuminate\Support\Facades\Auth;

/**
 * Class FeedbackRepository.
 */
class FeedbackRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Feedbacks::class;
    }
    public function Feedback($request)
    {
        $data=[
            'name'=>Auth::user()->first_name,
            'message'=>$request->note,
            'status'=>1,
        ];
        $feedback = Feedbacks::create($data);
        return new FeedbackResource($feedback);

    }
}
