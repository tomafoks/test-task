<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Storage::factory(3)->create();
    }
}
