<?php

namespace Database\Factories;

use App\Models\Equipment;
use App\Models\Storage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

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

        $role = 3; //роль='Distributor'

        /**
         * получаем рандомный id пользователя с ролью 'Distributor'
         */
        $user_id = DB::table('users')
                ->when($role, function ($query) use ($role) {
                    return $query->where('role_id', $role);
                })
                ->get()
                ->random()
                ->id;

        return [
            'name' => $this->faker->text(5),
            'price' => $this->faker->randomFloat(2, 30000, 100000000),
            'serial_number' => $this->faker->randomNumber(5, true),
            'inventory_number' => $this->faker->randomNumber(7, true),
            'distributor_id' => $user_id,
            'storage_id' => $this->faker->numberBetween(1, 3),
        ];
    }
}
