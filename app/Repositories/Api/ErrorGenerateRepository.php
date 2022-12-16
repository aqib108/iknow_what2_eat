<?php

namespace App\Repositories\Api;


use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Api\ErrorReportings;
use App\Http\Resources\Api\ListErrorResource;

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
        $data = ErrorReportings::all();
        return ListErrorResource::collection($data);

    }
}
