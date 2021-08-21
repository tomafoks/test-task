<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Filters\ManagerEquipmentFilter;
use App\Models\Equipment;
use Illuminate\Http\Request;

class ManagerReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManagerEquipmentFilter $filters)
    {
        return Equipment::filter($filters)->get();
    }
}
