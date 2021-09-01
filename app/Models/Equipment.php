<?php

namespace App\Models;

use App\Http\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Storage;
use Illuminate\Database\Eloquent\Builder;

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
        'storage_id'
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

    /**
     * фильтр для поиска и сортировки
     */
    public function scopeFilter(Builder $builder, QueryFilter $filters)
    {
        return $filters->apply($builder);
    }

    /**
     * Возврощает оборудование с нужной пагинацией, отсортированное по дате
     */
    static public function getEquipmentManager($paginate)
    {
        return self::latest()->paginate($paginate);
    }

    /**
     * переместить на склад $id - оборудование, $storageId - id склада
     */
    public function moveToStorage($request)
    {
        $equipment = $this::find($request->id);
        $equipment->storage_id = $request->storageId;
        $equipment->save();
        return $equipment;
    }
}
