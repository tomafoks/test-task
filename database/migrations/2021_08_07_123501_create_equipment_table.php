<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->string('price');
            $table->string('serial_number');
            $table->string('inventory_number');
            $table->integer('distributor_id')->unsigned();
            $table->integer('storage_id')->unsigned();
            $table->timestamps();

            /**
             * ссылаемся напрямую в таблицу users т.к. у нас нет таблицы distributors
            */
            // $table->foreign('distributor_id')->references('id')->on('users');

            // $table->foreign('storage_id')->references('id')->on('storages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment');
    }
}
