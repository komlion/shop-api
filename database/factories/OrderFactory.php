<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => Role::where('code', 'user')->first()->users->random(),
            'price' => rand(100, 10000)
        ];
    }
}