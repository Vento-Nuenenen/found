<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event = Event::where('event_name', '=', 'JotaJoti')->first();

        if ($event == null) {
            $event_date = Carbon::now()->subDays(100)->format('Y.m.d H:i:s');
            $event = Event::create(['event_name' => 'JotaJoti ' . date('Y'), 'event_date' => $event_date, 'event_active' => true]);
            $event->save();
        }
    }
}
