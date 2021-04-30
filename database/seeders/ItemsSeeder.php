<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;
use Faker\Generator as Faker;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 4; $i++) {
            $item = Item::where('item_name', '=', 'Test ' . $i)->first();

            if ($item == null) {
                $event = Item::create([
                    'item_identifier' => $i,
                    'item_name' => 'Test ' . $i,
                    'item_color' => $faker->colorName,
                    'item_size' => 'Gross',
                    'event_id' => 1,
                    'group_id' => 1,
                ]);
                $event->save();
            }
        }
    }
}
