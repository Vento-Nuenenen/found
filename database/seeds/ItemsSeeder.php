<?php

use Illuminate\Database\Seeder;

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
                'returned' => false,
                'item_price' => null,
                'for_sale' => false,
                'sold' => false,
                'fk_events' => 1,
                'fk_groups' => 1,
                'fk_customers' => null
            ]);
            $event->save();
        }
    }
}
