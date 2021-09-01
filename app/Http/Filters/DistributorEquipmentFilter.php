<?php

namespace App\Http\Filters;


class DistributorEquipmentFilter extends QueryFilter
{
    // фильтрация по дате
    public function date($order = 'asc', $distributorId)
    {
        return $this->builder->where('distributor_id', $distributorId)->orderBy('created_at', $order);
    }

    // фильтрация по цене
    public function price($order = 'asc', $distributorId)
    {
        return $this->builder->where('distributor_id', $distributorId)->orderBy('price', $order);
    }

    // фильтрация по складам
    public function storage($order = 'asc', $distributorId)
    {
        return $this->builder->where('distributor_id', $distributorId)->orderBy('storage_id', $order);
    }

    // поиск по названию
    public function searchName($keyword, $distributorId)
    {
        return $this->builder->where('distributor_id', $distributorId)->where('name', 'like', '%' . $keyword . '%');
    }

    // поиск по инвентарному номеру
    public function searchInventoryNumber($keyword, $distributorId)
    {
        return $this->builder->where('distributor_id', $distributorId)->where('inventory_number', 'like', '%' . $keyword . '%');
    }

    // поиск по серийному номеру
    public function searchSerialNumber($keyword, $distributorId)
    {
        return $this->builder->where('distributor_id', $distributorId)->where('serial_number', 'like', '%' . $keyword . '%');
    }
}
