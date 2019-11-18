<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id' => 1,
                'name' => 'user',
                'title' => 'Пользователь',
            ],
            [
                'id' => 2,
                'name' => 'premium_user',
                'title' => 'Премиум пользователь',
            ],
            [
                'id' => 3,
                'name' => 'moderator',
                'title' => 'Модератор',
            ],
            [
                'id' => 4,
                'name' => 'administrator',
                'title' => 'Администратор',
            ],
        ]);
    }
}
