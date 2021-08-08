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
        'storage_id',
    ];

    /**
     * отношение оборудования к поставщику
     */
    public function distributor()
    {
        return $this->belongsTo(Distributor::class);
    }

    /**
     * отношение оборудования к складу
     */
    public function storage()
    {
        return $this->belongsTo(Storage::class);
    }
}
