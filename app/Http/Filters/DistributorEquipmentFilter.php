<?php

namespace App\Http\Filters;


class DistributorEquipmentFilter extends QueryFilter
{
    // фильтрация по дате
    public function date($order = 'asc')
    {
        return $this->builder->orderBy('created_at', $order);
    }

    // фильтрация по цене
    public function price($order = 'asc')
    {
        return $this->builder->orderBy('price', $order);
    }

    // фильтрация по складам
    public function storage($order = 'asc')
    {
        return $this->builder->orderBy('storage_id', $order);
    }

    // поиск по названию
    public function searchName($keyword)
    {
        return $this->builder->where('name', 'like', '%' . $keyword . '%');
    }

    // поиск по инвентарному номеру
    public function searchInventoryNumber($keyword)
    {
        return $this->builder->where('inventory_number', 'like', '%' . $keyword . '%');
    }

    // поиск по серийному номеру
    public function searchSerialNumber($keyword)
    {
        return $this->builder->where('serial_number', 'like', '%' . $keyword . '%');
    }
}
