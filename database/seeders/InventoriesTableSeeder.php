<?php

namespace Database\Seeders;

use App\Models\Inventory;
use App\Models\Survivor;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class InventoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Inventory::factory(3)->create();
        Inventory::create([
            'quantity' => 1,
            'survivor_id' => 1,
            'item_id' => 1,
        ]);

        Inventory::create([
            'quantity' => 2,
            'survivor_id' => 1,
            'item_id' => 4,
        ]);

        Inventory::create([
            'quantity' => 6,
            'survivor_id' => 2,
            'item_id' => 4,
        ]);

        Inventory::create([
            'quantity' => 1,
            'survivor_id' => 3,
            'item_id' => 2,
        ]);

        Inventory::create([
            'quantity' => 1,
            'survivor_id' => 3,
            'item_id' => 3,
        ]);

        Inventory::create([
            'quantity' => 1,
            'survivor_id' => 3,
            'item_id' => 4,
        ]);
        

    }
}
