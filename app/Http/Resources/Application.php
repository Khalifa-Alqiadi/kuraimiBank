<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Application extends JsonResource
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
            'id'            => $this->id,
            'name'          => $this->name,
            'list_info'     => $this->list_info,
            'play_link'     => $this->play_link,
            'store_link'    => $this->store_link,
            'is_active'     => $this->is_active,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at
        ];
    }
}
