<?php

namespace App\Http\Controllers\Distributor;

use App\Http\Controllers\Controller;
use App\Http\Filters\DistributorEquipmentFilter;
use App\Http\Resources\DistributorReportResource;
use App\Models\Equipment;
use Illuminate\Support\Facades\Gate;

class DistributorReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DistributorEquipmentFilter $filters)
    {
        //проверка прав пользователя
        // Gate::authorize('distributor', 'users');

        $distributorId = auth()->user()->id;
        $report = Equipment::filter($filters, $distributorId)->get();
        return response(DistributorReportResource::collection($report), 200);
    }
}
