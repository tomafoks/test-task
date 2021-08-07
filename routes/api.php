<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * Disributor (поставщики)
 */
Route::resource('disributor', Distributor\DistributorController::class)->except(['destroy']);

/**
 * Manager (управляющий)
 */
Route::resource('manager', Manager\ManagerController::class)->except(['destroy']);

/**
 * Equipment (оборудование)
 */
Route::resource('equipment', Equipment\EquipmentController::class)->except(['destroy']);

/**
 * Storage (склад)
 */
Route::resource('storage', Storage\StorageController::class)->only(['index']);
