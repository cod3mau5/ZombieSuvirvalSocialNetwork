<?php

namespace Database\Seeders;

use App\Models\Inventory;
use App\Models\Suvirvor;
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
        $suvivors=Suvirvor::all();
        $items= [
            4=>'Water',
            3=>'Food',
            2=>'Medication',
            1=>'Ammunition'
        ];
        foreach($suvivors as $suvivor){
            foreach($items as $key=>$item){
                $item=Inventory::create([
                    'item'=> $item,
                    'points'=> $key,
                    'created_at'=> Carbon::now(),
                    'suvivor_id'=>$suvivor->id
                ]);
            }
        }

    }
}
