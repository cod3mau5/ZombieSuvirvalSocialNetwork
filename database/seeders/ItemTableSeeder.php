<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items= [
            4=>'Water',
            3=>'Food',
            2=>'Medication',
            1=>'Ammunition'
        ];
        foreach($items as $key=>$item){
            $item=Item::create([
                'name'=> $item,
                'points'=> $key,
                'created_at'=> Carbon::now(),
            ]);
        }
    }
}
