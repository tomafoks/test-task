<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Distributor;
use App\Models\Manager;
use App\Models\Storage;

class Equipment extends Model
{
    protected $fillable = [
        'name',
        'price',
        'serial_number',
        'inventory number',
        'distributor_id',
    ];

    /**
     * отношение оборудования ко множесту поставщиков
     */
    public function distributors()
    {
        return $this->belongsToMany(Distributor::class);
    }

    /**
     * отношение оборудований ко множесту урпаляющих
     */
    public function managers()
    {
        return $this->belongsToMany(Manager::class);
    }

    /**
     * отношение оборудования к складу
     */
    public function storage()
    {
        return $this->belongsTo(Storage::class);
    }
}
