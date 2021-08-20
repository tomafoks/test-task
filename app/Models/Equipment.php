<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Storage;

class Equipment extends Model
{
    use HasFactory;
    protected $table = 'equipment';

    protected $fillable = [
        'name',
        'price',
        'serial_number',
        'inventory_number',
        'distributor_id',
    ];

    /**
     * отношение оборудования к поставщику
     */
    public function distributor()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * отношение оборудования к складу
     */
    public function storage()
    {
        return $this->belongsTo(Storage::class);
    }

    public function createEquipment($request)
    {
        $equipment = $this::create(
            $request->only(
                'name',
                'price',
                'serial_number',
                'inventory_number',
            ) + ['distributor_id' => auth()->user()->id]
        );
        return $equipment;
    }
}
