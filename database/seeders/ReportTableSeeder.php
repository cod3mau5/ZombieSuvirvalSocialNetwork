<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Seeder;

class ReportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Report::create([
            'reporter_id' => 1,
            'reported_id' => 4
        ]);

        Report::create([
            'reporter_id' => 2,
            'reported_id' => 4
        ]);

        Report::create([
            'reporter_id' => 3,
            'reported_id' => 4
        ]);
    }
}
