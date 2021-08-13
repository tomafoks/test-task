<?php

namespace App\Http\Controllers\Equipment;

use App\Http\Controllers\Controller;
use App\Http\Resources\EquipmentResource;
use App\Models\Equipment;
use App\Models\User;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $dist = User::find($userId)->equipments;
        dd($dist);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $equipment = Equipment::created(
            $request->only(
                'name',
                'price',
                'serial_number',
                'inventory_number',
            ) + ['distributor_id' => auth()->user()->id]
        );
        return response(new EquipmentResource($equipment), 201);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
