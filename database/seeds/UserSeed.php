<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Admin', 'lastname' => null, 'email' => 'admin@admin.com', 'password' => '$2y$10$3FjKf1JfCHHl2fl0uaGDbuEFD0C0RF6L2SILYJsft/qYClo6IkVNC', 'birthdate' => '', 'address' => null, 'role_id' => 3, 'remember_token' => '', 'profilphoto' => null, 'group_id' => null,],
            ['id' => 2, 'name' => 'User', 'lastname' => 'UserN', 'email' => 'user@user.com', 'password' => '$2y$10$3DAGTnqUpjLDqY9fQaKlzumc9KIA08ZxOGG/K7YWd64V88M./mJMK', 'birthdate' => '10-09-1994', 'address' => 'Carl-Zeiss Promenade 8', 'role_id' => 2, 'remember_token' => null, 'profilphoto' => null, 'group_id' => 1,],
            ['id' => 3, 'name' => 'simple', 'lastname' => 'admin', 'email' => 'simple@admin.com', 'password' => '$2y$10$NsxPDr.L8NSfumcghk2mBuQ9RC.c9bJEUjHMWaP/PCGNNW46Lmhfm', 'birthdate' => '19-03-1997', 'address' => 'Augsburger Str. 9', 'role_id' => 1, 'remember_token' => null, 'profilphoto' => null, 'group_id' => null,],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
