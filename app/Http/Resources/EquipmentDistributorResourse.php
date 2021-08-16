<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EquipmentDistributorResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'serial_number' => $this->serial_number,
            'inventory_number' => $this->inventory_number,
            'created_at' => $this->created_at,
            // 'distributor' => $this->distributor->role,
        ];
    }
}
