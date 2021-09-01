<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreManagerStorageRequest;
use App\Http\Resources\EquipmentManagerResource;
use App\Jobs\MoveEquipmentToStorage;
use App\Models\Equipment;

class EquipmentManagerController extends Controller
{
    public function index()
    {
        //получаем отсортированный ответ по последнему добавлению
        $equipments = Equipment::getEquipmentManager(10);
        return EquipmentManagerResource::collection($equipments);
    }

    public function store(StoreManagerStorageRequest $request)
    {
        //перемещаем оборудавание по складам
        $equipment = new Equipment();
        $equipment = $equipment->moveToStorage($request);

        //отправка уведомления о перемещении на склад
        MoveEquipmentToStorage::dispatch($equipment);

        return response(new EquipmentManagerResource($equipment), 201);
    }
}
