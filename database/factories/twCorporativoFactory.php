<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class twCorporativoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'S_NombreCorto' => $this->faker->name(),
            'S_NombreCompleto' => $this->faker->lastName(),
            'S_LogoURL' => $this->faker->url(),
            'S_DBName' => $this->faker->name(),
            'S_DBUsuario' => $this->faker->name(),
            'S_DBPassword' => $this->faker->password(),
            'A_Activo' => $this->faker->boolean(),
            'created_at' => $this->faker->dateTimeThisMonth(),
            //'tw_usuarios_id' => $this->faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
            'tw_usuarios_id' => \App\Models\twUsuario::factory()
        ];

    }
}
