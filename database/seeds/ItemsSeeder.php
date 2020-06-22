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
                'event_id' => 1,
                'group_id' => 1,
                'customer_id' => null
            ]);
            $event->save();
        }
    }
}
