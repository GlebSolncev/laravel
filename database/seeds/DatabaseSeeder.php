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
        # UsersTableSeeder
        $this->call(RoleTableSeeder::class);
        $this->call(VideoTableSeeder::class);
        $this->call(ComponentTableSeeder::class);


        $this->call(UsersTableSeeder::class);
    }
}
