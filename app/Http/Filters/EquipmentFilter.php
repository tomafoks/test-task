<?php

namespace App\Http\Filters;


class EquipmentFilter extends QueryFilter
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

    // поиск ...
    public function search($keyword)
    {
        return $this->builder->where('title', 'like', '%' . $keyword . '%');
    }



    // public function brands($brandIds)
    // {
    //     return $this->builder->whereIn('brand_id', $this->paramToArray($brandIds));
    // }
}
