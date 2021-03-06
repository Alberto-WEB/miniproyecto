<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           /*  'username' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'S_Nombre' => $this->faker->name(),
            'S_Apellidos' => $this->faker->lastName(),
            'S_FotoPerfilUrl' => $this->faker->url(),
            //'S_Activo' => $this->faker->boolean(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'verification_token' => Str::random(10),
            'verified' => 'DISABLED',
            'created_at' => $this->faker->dateTimeThisMonth(), */
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
