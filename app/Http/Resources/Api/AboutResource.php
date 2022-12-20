<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutResource extends JsonResource
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
            'about' => $this->about_me_en,
            'stayConnect'=> $this->stay_social_en,
            'Instagram' => $this->insta_url,
            'Snapchat' => $this->snapchat_url,
            'Tiktok' => $this->tiktok_url,
            'Youtube' => $this->youtube_url,
        ];
        // return parent::toArray($request);
    }
}
