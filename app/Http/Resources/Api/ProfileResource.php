<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'userId' => $this->id,
            'firstName' => $this->first_name,
            'lastName'=>$this->last_name,
            'phone'=>$this->phone_number,
            'gender'=>$this->gender,
            'Dob'=>$this->dob,
            'otp'=>$this->otp,
            'profile'=>$this->profile,
        ];
        // return parent::toArray($request);
    }
}
