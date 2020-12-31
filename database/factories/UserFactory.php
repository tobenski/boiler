<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
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
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName,
            'company' => $this->faker->company,
            'cvr' => $this->faker->numberBetween(10000000, 99999999),
            'email' => $this->faker->companyEmail,
            'password' => Hash::make('password'),
            'phone' => $this->faker->numberBetween(10000000,99999999),
            'address' => $this->faker->streetAddress,
            'zip' => $this->faker->numberBetween(1000,9999),
            'city' => $this->faker->city,
            'country' => $this->faker->country,
        ];
    }
}
