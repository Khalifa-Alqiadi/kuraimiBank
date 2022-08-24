<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SuccessStories extends JsonResource
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
            'id'                    => $this->id,
            'title'                 => $this->title,
            'description'           => $this->description,
            'onther_description'    => $this->onther_description,
            'background'            => $this->background,
            'images'                => $this->images,
            'service_id'            => $this->service_id,
            'is_active'             => $this->is_active,
            'created_at'            => $this->created_at,
            'updated_at'            => $this->updated_at
        ];
    }
}
