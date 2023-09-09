<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reimburse>
 */
class ReimburseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => mt_rand(3,5),
            'status_id' => mt_rand(1,4),
            'title' => $this->faker->sentence(mt_rand(2,8)),
            'detail' => $this->faker->paragraph(),
            'amount' => $this->faker->randomNumber(5, true),
            'submitted_at' => date('Y-m-d H:i:s')
        ];
    }
}
