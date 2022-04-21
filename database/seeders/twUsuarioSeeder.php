<?php

namespace Database\Seeders;

use App\Models\twUsuario;
use Illuminate\Database\Seeder;

class twUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        twUsuario::factory(1)->create();
    }
}
