<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * отношение склада ко множесту оборудования
     */
    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }
}
