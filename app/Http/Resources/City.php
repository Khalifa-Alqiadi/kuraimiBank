<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class City extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public $preserveKeys = true;
    public function toArray($request)
    {
        //  parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'country_id' => $this->country_id,
            'is_active' => $this->is_active,
            'country'   => new Country($this->country),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
