<?php

namespace App\Http\Resources;

use App\Models\Service;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceSlider extends JsonResource
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
            'id'                => $this->id,
            'title'             => $this->title,
            'description'       => $this->description,
            'image'             => $this->image,
            'service_id'        => $this->service_id,
            'service'           => new Service($this->service),
            'is_active'         => $this->is_active,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at
        ];
    }
}
