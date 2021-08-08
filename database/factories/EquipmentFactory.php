<?php

namespace Database\Factories;

use App\Models\Equipment;
use App\Models\Storage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Equipment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(3),
            'price' => $this->faker->randomFloat(2, 30000, 100000000),
            'serial_number' => $this->randomNumber(5, true),
            'inventory_number' => $this->faker->randomNumber(7, true),
            'distributor_id' => User::all()->random()->id,
            'storage_id' => Storage::all()->random()->id,
        ];
    }
}
