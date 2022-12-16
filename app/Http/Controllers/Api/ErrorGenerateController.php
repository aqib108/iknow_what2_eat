<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
}
