<?php

namespace App\Repositories\Api;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Api\User;
use Twilio\Rest\Client;
use App\Http\Resources\Api\UserResource;
use App\Http\Resources\Api\OtpGenerateResource;
use App\Http\Resources\Api\OtpVerifyResource;
use App\Http\Resources\Api\ProfileResource;
use App\Http\Resources\Api\DobResource;
use App\Http\Resources\Api\ImageUploadResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


/**
 * Class UserRepository.
 */
class UserRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return User::class;
    }
    public function create($request){

        $data = [
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'dob' => $request->Dob,
            'gender' => $request->gender,
            'mobile_user'=>1,
            'phone_number' => $request->phone_number
        ];
            // $user = User::create($data);
           $user= User::where('phone_number', $data['phone_number'])->update($data);
           if($user==1){
            $response = User::where('phone_number', $data['phone_number'])->first();
            $userResponse =  new UserResource($response);
            return $userResponse;
           }
        }
      public function login($request){
        $data = [
            'phone_number' => $request->phone_number,
        ];
        $user = User::where('phone_number', $data['phone_number'])->first();
        if($user){
            $userResponse =  new UserResource($user);
            return $userResponse;
        }

      }
       public function generateOTP($request){
            $data = [
                'phone_number' => $request->phone_number,
            ];
            // $token = env("TWILIO_AUTH_TOKEN");
            // $twilio_sid = env("TWILIO_SID");
            // $twilio_verify_sid = env("TWILIO_VERIFY_SID");
            $token = "2c2b614113d01ca452baea9ce77d788b";
            $twilio_sid = "ACa5b90499ac8133b6879fefb276856a17";
            $twilio_verify_sid = "VA6cfbc30f37337eea5d36ba8ebc84ac42";
            $user = User::updateOrCreate(['phone_number'=>$data['phone_number']],$data);
            $twilio = new Client($twilio_sid, $token);
            $response=$twilio->verify->v2->services($twilio_verify_sid)
                ->verifications
                ->create($data['phone_number'], "sms");
            $optResponse =  new OtpGenerateResource($response);
            return $optResponse;
        }
       public function verifyOTP($request){
            $data = [
                'phone_number' => $request->phone_number,
                'verification_code' => $request->otp,
            ];
            try{
                $token = "2c2b614113d01ca452baea9ce77d788b";
                $twilio_sid = "ACa5b90499ac8133b6879fefb276856a17";
                $twilio_verify_sid = "VA6cfbc30f37337eea5d36ba8ebc84ac42";
            $twilio = new Client($twilio_sid, $token);
            $verification = $twilio->verify->v2->services($twilio_verify_sid)
                ->verificationChecks
                ->create([
                    "to" => $data['phone_number'],
                    "code" => $data['verification_code']
                ]);
            if ($verification->valid) {
                 tap(User::where('phone_number', $data['phone_number']))->update(['otp_verified' => 1, 'otp' => $data['verification_code']]);
                 $response = User::where('phone_number', $data['phone_number'])->first();
                 $optResponse =  new OtpVerifyResource($response);
                 return $optResponse;
        }
    }
    catch(\Exception $e){
        dd($e);

    }
    }
    public function getProfile($request){
        $user = User::where('id', $request->user()->id)->first();
        $ProfileResponse =  new ProfileResource($user);
            return $ProfileResponse;
    }
    public function dobUpdate($request){
        $data = [
            'dob' => $request->Dob,
        ];
        $user = User::where('id', $request->user()->id)->update($data);
        $response = User::where('id', $request->user()->id)->first();
        $DobResponse =  new DobResource($response);
            return $DobResponse;
    }
    public function uploadImage($request){
        $img = $request->file('image');
        $data['profile'] = $img->getClientOriginalName();
        //  $path= Storage::put('public/images'  , $img);
         $path = Storage::disk('public')->put('images', $img);
        //  $data['profile_img']=trim($path,"public");
         $data['profile_img']=$path;
       $response = User::where('id', $request->user()->id)->update($data);
       if($response==1){
        $imageUploadResponse = User::where('id', $request->user()->id)->first();
        $imageUploadResponse =  new ImageUploadResource($imageUploadResponse);
        return $imageUploadResponse;
    }






    }
    public function editProfile($request){
        $data = [
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'phone_number'=>$request->Phone,
            'dob' => $request->Dob,
            'profile_img'=>$request->Image
        ];
        User::where('id', $request->user()->id)->update($data);
        $response = User::where('id', $request->user()->id)->first();
        $ProfileResponse =  new ProfileResource($response);
            return $ProfileResponse;


    }


}
