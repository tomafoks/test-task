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
    Route::group(['prefix' => 'distributor'], function () {
        Route::resource('equipment', Distributor\EquipmentDistributorController::class)
            ->except(['destroy']);
        // ->middleware('chek.role:Distributor');

        /**
         * отчет поставщика
         */
        Route::get('report', 'Distributor\DistributorReportController@index');
    });

    /**
     * Manager (управляющий)
     */
    Route::group(['prefix' => 'manager'], function () {
        Route::resource('equipment', Manager\EquipmentManagerController::class)
            ->except(['destroy']);
        // ->middleware('chek.role:Manager');

        /**
         * отчет управляющего
         */
        Route::get('report', 'Manager\ManagerReportController@index');
    });
});
