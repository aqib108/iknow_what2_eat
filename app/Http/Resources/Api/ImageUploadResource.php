<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ImageUploadResource extends JsonResource
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
            'Collection' => [
           'filename'=>$this->profile,
           'filePath'=>asset('storage/'.$this->profile_img)
            ]

        ];
        // return parent::toArray($request);
    }
}
