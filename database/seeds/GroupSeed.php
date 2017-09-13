<?php

use Illuminate\Database\Seeder;

class GroupSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'grp_name' => 'Group1', 'admin_id' => 3,],

        ];

        foreach ($items as $item) {
            \App\Group::create($item);
        }
    }
}
