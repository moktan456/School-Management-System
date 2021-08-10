<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                // 'usertype' => $this->faker->randomElement(['Student','Employee']);
                // 'name' => $this->faker->name(),
                // 'email' => $this->faker->unique()->safeEmail(),
                // 'designation' => $this->faker->randomElement(['Teacher', 'Staff', 'SSI', 'Cook', 'Sweeper']),
                // 'employee_id' => Str::random(10),
                // 'citizen_id' => $this->faker->numerify('###########'),
                // 'phone_number' => $this->faker->numerify('########'),
                // 'qualification' => 'Degree',
                // 'address' => Str::random(30),
                // 'user_type' => $this->faker->randomElement(['Teacher', 'Staff']),
                // 'joining_date' => now(),
                // 'password' => bcrypt('password'), // password
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
