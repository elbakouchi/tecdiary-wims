<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WarehouseResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'value' => $this->id,
            'label' => $this->name,
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'deleted_at' => $this->deleted_at,
            'phone' => $this->phone,
            'email'=> $this->email,
            'address' => $this->address,
            'active'=> $this->active
        ];
    }
}
