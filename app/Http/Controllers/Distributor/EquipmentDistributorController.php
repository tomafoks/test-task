<?php

namespace App\Http\Controllers\Distributor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEquipmentRequest;
use App\Http\Resources\EquipmentDistributorResourse;
use App\Models\Equipment;
use App\Models\User;
use App\Notifications\RegistrEquipment;

class EquipmentDistributorController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $dist = User::find($userId)->equipments()->paginate(10);
        return EquipmentDistributorResourse::collection($dist);
    }

    public function store(StoreEquipmentRequest $request)
    {
        $equipment = Equipment::create(
            $request->only(
                'name',
                'price',
                'serial_number',
                'inventory_number',
            ) + ['distributor_id' => auth()->user()->id]
        );
        $user = User::find(auth()->user()->id);
        $user->notify(new RegistrEquipment($user->name));

        return response(new EquipmentDistributorResourse($equipment), 201);
    }
}
