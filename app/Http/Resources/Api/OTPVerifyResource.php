<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class OTPVerifyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'gender'=>$this->gender,
            'Dob' => $this->dob,
            'phone' => $this->phone_number,

        ];
        // return parent::toArray($request);
    }
}
