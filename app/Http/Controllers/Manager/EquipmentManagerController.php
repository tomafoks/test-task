<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreManagerStorage;
use App\Http\Resources\EquipmentManagerResource;
use App\Models\Equipment;

class EquipmentManagerController extends Controller
{
    public function index()
    {
        //получаем отсортированный ответ по последнему добавлению
        $equipments = Equipment::getEquipmentManager(10);
        return EquipmentManagerResource::collection($equipments);
    }

    public function store(StoreManagerStorage $request)
    {

    }
}
