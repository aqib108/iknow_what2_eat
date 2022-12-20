<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class UserFavourtRestaurantListResource extends JsonResource
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
            
            'restaurant'=>[
            'restaurantName' => $this->title_en,
            'isNew' => $this->new_in_town,
        ]];
        // return parent::toArray($request);
    }
}
