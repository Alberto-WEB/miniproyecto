<?php

namespace Database\Seeders;

use App\Models\twCorporativo;
use Illuminate\Database\Seeder;

class twCorporativoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        twCorporativo::factory(10)->create();
    }
}
