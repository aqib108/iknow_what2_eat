<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class CuisineListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $CuisineList = [
            'Cuisine' => [
            'id' => $this->id,
            'name_en' => $this->name_en,
            'image' => $this->image,
            'status' => $this->status,
            ]
        ];
        return [
           'CuisineList' => $CuisineList
        ];
        // return parent::toArray($request);
    }
}
