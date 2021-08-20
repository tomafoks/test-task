<?php

namespace App\Http\Controllers;

use App\Http\Filters\EquipmentFilter;
use App\Models\Equipment;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EquipmentFilter $filters)
    {
        return Equipment::filter($filters)->get();
    }
}
