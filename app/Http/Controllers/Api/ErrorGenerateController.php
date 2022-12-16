<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ErrorReportRequest;
use Illuminate\Http\Request;
use App\Repositories\Api\ErrorGenerateRepository;

class ErrorGenerateController extends BaseController
{
    protected $ErrorGenerateRepository;
    public function __construct(ErrorGenerateRepository $ErrorGenerateRepository)
    {
       $this->ErrorGenerateRepository = $ErrorGenerateRepository;
    }
    public function errorReportList(Request $request){
        $data = $this->ErrorGenerateRepository->errorReportList($request);
        return $this->sendResponse($data,'Error Report List generated successfully');
    }
    public function errorReport(ErrorReportRequest $request){
        $data = $this->ErrorGenerateRepository->errorReport($request);
        return $this->sendResponse($data,'Error Reported successfully');
    }
}
