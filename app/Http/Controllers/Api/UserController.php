<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserRegisterRequest;
use Illuminate\Http\Request;
use App\Repositories\Api\UserRepository;
use App\Http\Requests\Api\OtpGenerateRequest;
use App\Http\Requests\Api\OtpVerifyRequest;
use App\Http\Requests\Api\ImageStoreRequest;
use App\Http\Requests\Api\EditProfileRequest;




class UserController extends BaseController
{
    protected $UserRepository;
    public function __construct(UserRepository $UserRepository)
    {
       $this->UserRepository = $UserRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(UserRegisterRequest $request)
    {
        $data = $this->UserRepository->create($request);
        return $this->sendResponse($data,'User Created Successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function login(Request $request){
        $data = $this->UserRepository->login($request);
        if(is_null($data))
        {
            return $this->sendError('User Not Found');
        }
        return $this->sendResponse($data,'User Logged In Successfully');

    }

    public function generateOTP(OtpGenerateRequest $request)
    {
        $data = $this->UserRepository->generateOTP($request);
        return $this->sendResponse($data,'Otp Generated Successfully');

    }

    public function verifyOTP(OtpVerifyRequest $request)
    {
        $data = $this->UserRepository->verifyOTP($request);
        return $this->sendResponse($data,'Otp Verified Successfully');

    }

    public function getProfile(Request $request){
        $data = $this->UserRepository->getProfile($request);
        return $this->sendResponse($data,'Profile retrieved Successfully');

        }
    public function dobUpdate(Request $request){
        $data = $this->UserRepository->dobUpdate($request);
        return $this->sendResponse($data,'Dob Updated Successfully');

        }
    public function uploadImage(ImageStoreRequest $request){
        $data = $this->UserRepository->uploadImage($request);
        return $this->sendResponse($data,'Image Uploaded Successfully');

        }

    public function editProfile(EditProfileRequest $request){
        $data = $this->UserRepository->editProfile($request);
        return $this->sendResponse($data,'Profile Updated Successfully');

        }



}
