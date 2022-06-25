<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServicePoint extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'phone' => $this->phone,
            'second_phone' => $this->second_phone,
            'working_hours' => $this->working_hours,
            'is_active' => $this->is_active,
            'city'   => new City($this->city),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
