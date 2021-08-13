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


Route::group(['middleware' => 'auth.basic.once'], function () {
    /**
     * Distributor (поставщики)
     */
    Route::resource('distributor', Distributor\DistributorController::class)
        ->except(['destroy']);
        // ->middleware('chek.role:Distributor');

    /**
     * Manager (управляющий)
     */
    Route::resource('manager', Manager\ManagerController::class)
        ->except(['destroy']);
        // ->middleware('chek.role:Manager');

    /**
     * Equipment (оборудование)
     */
    Route::resource('equipment', Equipment\EquipmentController::class)
        ->except(['destroy']);
        // ->middleware('chek.role:Admin');

    /**
     * Storage (склад)
     */
    Route::resource('storage', Storage\StorageController::class)
        ->only(['index']);
        // ->middleware('chek.role:Admin');

});
