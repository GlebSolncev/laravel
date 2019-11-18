<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')
            ->insert([
                [
                    'id' => 1,
                    'role_id' => 1,
                    'name' => 'Gleb',
                    'email' => 'qwe111@qwe.qwe',
                    'email_verified_at' => date('Y-m-d H:i:s'),
                    'password' => \Illuminate\Support\Facades\Hash::make('qweqwe'),

                ],
            ]);
    }

}
