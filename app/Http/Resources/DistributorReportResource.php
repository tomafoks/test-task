<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DistributorReportResource extends JsonResource
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
            'name' => $this->name,
            'price' => $this->price,
            'serial_number' => $this->serial_number,
            'inventory_number' => $this->inventory_number,
            'created_at' => $this->created_at,
            'storage' => [
                'id' => $this->storage['id'],
                'name' => $this->storage['name']
            ],
        ];
    }
}
