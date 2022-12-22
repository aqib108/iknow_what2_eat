<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Api\CountryRepository;

class CountryController extends BaseController
{
    protected $CountryRepository;
    public function __construct(CountryRepository $CountryRepository)
    {
       $this->CountryRepository = $CountryRepository;
    }
    public function countryCode(Request $request){
        $data = $this->CountryRepository->countryCode($request);
        return $this->sendResponse($data,'Country Code List generated successfully');
    }
}
