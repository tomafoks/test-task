<?php

namespace App\Models;

class Distributor extends User
{
    /**
     * отношение поставщика ко множесту оборудования
     */
    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }
}
