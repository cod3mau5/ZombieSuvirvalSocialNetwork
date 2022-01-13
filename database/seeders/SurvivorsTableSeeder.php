<?php

namespace Database\Seeders;

use App\Models\Survivor;
use Illuminate\Database\Seeder;

class SurvivorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Survivor::factory(20)->create();
    }
}
