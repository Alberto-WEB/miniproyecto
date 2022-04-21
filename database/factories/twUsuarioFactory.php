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
            //'S_Activo' => $this->faker->boolean(),
            'password' => '12345',
            'verification_token' => $this->faker->md5(),
            'verified' => 'DISABLED',
            'created_at' => $this->faker->dateTimeThisMonth(),

           /*  'username' => 'CarlosDev',
            'email' => 'carlos@gmail.com',
            'S_Nombre' => 'Carlos',
            'S_Apellidos' => 'Guzman',
            'S_FotoPerfilUrl' => $this->faker->url(),
            //'S_Activo' => $this->faker->boolean(),
            'password' => '12345678',
            'verification_token' => $this->faker->md5(),
            'verified' => 'DISABLED',
            'created_at' => $this->faker->dateTimeThisMonth(), */
        ];
    }
}
