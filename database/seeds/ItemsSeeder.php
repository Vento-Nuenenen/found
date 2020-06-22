<?php

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = Item::where('item_name', '=', 'Test 1')->first();

        if($item == null){
            $event = Item::create([
                'item_identifier' => '1',
                'item_name' => 'Test 1',
                'item_color' => 'Blau',
                'item_size' => 'Gross',
                'fk_events' => 1,
                'fk_groups' => 1,
                'fk_customers' => null
            ]);
            $event->save();
        }
    }
}
