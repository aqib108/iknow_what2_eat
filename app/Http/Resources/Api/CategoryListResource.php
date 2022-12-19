<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryListResource extends JsonResource
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
        'categories'=>[
            'id' => $this->id,
            'image' => $this->icon,
            'name' => $this->name_en,
       ]
        ];
        // return parent::toArray($request);
    }
}
