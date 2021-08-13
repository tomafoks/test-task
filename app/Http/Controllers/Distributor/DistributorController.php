<?php

namespace App\Http\Controllers\Distributor;

use App\Http\Controllers\Controller;
use App\Http\Resources\DistributorResource;
use App\Models\User;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $dist = User::find($userId);
        return new DistributorResource($dist);
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
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
