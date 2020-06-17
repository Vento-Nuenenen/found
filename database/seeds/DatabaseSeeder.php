<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(GroupsSeeder::class);
        $this->call(EventsSeeder::class);
        $this->call(ItemsSeeder::class);
    }
}
