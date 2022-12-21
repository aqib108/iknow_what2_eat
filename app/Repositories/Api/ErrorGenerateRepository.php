<?php

namespace App\Repositories\Api;


use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Api\ErrorReportings;
use App\Http\Resources\Api\ListErrorResource;
use App\Http\Resources\Api\ErrorGenerateResource;

/**
 * Class ErrorGenerateRepository.
 */
class ErrorGenerateRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        //return YourModel::class;
        return ErrorReportings::class;

    }
    public function errorReportList($request){
        $data = ErrorReportings::with('errorType')->get();
        return ListErrorResource::collection($data);

    }
    public function errorReport($request){
          $data=[
            'error_type_id'=>$request->errors,
            'message'=>$request->message,
          ];
            $data = ErrorReportings::create($data);
            return new ErrorGenerateResource($data);


    }
}
