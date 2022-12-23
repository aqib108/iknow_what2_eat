<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class TopItemListResource extends JsonResource
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
            'id' => $this->id,
            'restaurantId' => $this->restaurant_id,
            'image'=> $this->image,
            'name' => $this->item_name_en,
            'avgPrice' => $this->item_price,



        ];
        // return parent::toArray($request);
    }
}
