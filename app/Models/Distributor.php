<?php

namespace App\Models;
use App\Models\Equipment;

class Distributor extends User
{
    // отношение поставщиков ко множесту оборудования
    public function equipments()
    {
        return $this->belongsToMany(Equipment::class);
    }
}
