<?php

use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups_container = ['Kopfbedeckung', 'Oberteile', 'Unterteile', 'Füsse', 'Accessoires', 'Anderes'];

        foreach($groups_container as $group_name){
            $group = Group::where('group_name', '=', $group_name)->first();

            if($group == null){
                $group = Event::create(['group_name' => $group_name, 'group_active' => true]);
                $group->save();
            }
        }
    }
}
