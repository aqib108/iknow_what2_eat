<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
    //    dd(test());
        return [
            'id' => $this->id,
            'image' => $this->restaurantPhotos,
            'isNew' => $this->new_in_town,
            'name' => $this->title_en,
            'avgPrice' => $this->price_en,
            'location_id'=>$this->restaurantLocations

        ];

        // return parent::toArray($request);
    }
}
