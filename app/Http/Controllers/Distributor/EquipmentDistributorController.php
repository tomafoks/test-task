<?php

namespace App\Http\Controllers\Distributor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEquipmentRequest;
use App\Http\Resources\EquipmentDistributorResourse;
use App\Jobs\RegisterEquipment;
use App\Models\Equipment;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class EquipmentDistributorController extends Controller
{
    public function index()
    {
        Gate::authorize('distributor', 'equipment');
        $userId = auth()->user()->id;
        $dist = User::find($userId)->equipments()->paginate(10);
        return EquipmentDistributorResourse::collection($dist);
    }

    public function store(StoreEquipmentRequest $request)
    {
        Gate::authorize('distributor', 'equipment');
        //создаем оборудование
        $equipment = new Equipment();
        $equipment = $equipment->createEquipment($request);

        //отправка уведомления о зарегистрированном оборудовании
        RegisterEquipment::dispatch($equipment);

        return response(new EquipmentDistributorResourse($equipment), 201);
    }
}
