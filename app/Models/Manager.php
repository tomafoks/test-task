<?php

namespace App\Models;

use App\Models\Equipment;

class Manager extends User
{
    /**
     * отношение управлющих ко множесту оборудования
     */
    public function equipments()
    {
        return $this->belongsToMany(Equipment::class);
    }
}
