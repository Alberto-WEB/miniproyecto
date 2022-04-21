<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class twUsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'S_Nombre' => $this->faker->name(),
            'S_Apellidos' => $this->faker->lastName(),
            'S_FotoPerfilUrl' => $this->faker->url(),
            'S_Activo' => $this->faker->boolean(),
            'password' => $this->faker->password(),
            'verification_token' => $this->faker->randomDigit(),
            'verified' => $this->faker->randomLetter(),
            'created_at' => $this->faker->date(),
            'updated_at' => $this->faker->dateTimeThisMonth(),
        ];
    }
}
