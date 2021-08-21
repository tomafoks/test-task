<?php

namespace App\Http\Controllers\Distributor;

use App\Http\Controllers\Controller;
use App\Http\Filters\DistributorEquipmentFilter;
use App\Models\Equipment;
use Illuminate\Http\Request;

class DistributorReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DistributorEquipmentFilter $filters)
    {
        return Equipment::filter($filters)->get();
    }
}
