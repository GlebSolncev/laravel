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
        $collection[] =[
            'id' => 1,
            'role_id' => 4,
            'name' => 'Gleb',
            'email' => 'qwe111@qwe.qwe',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => \Illuminate\Support\Facades\Hash::make('qweqwe'),
        ];
        for($i=2; $i < 100; $i++):
            $collection[] = [
                'id' => $i,
                'role_id' => rand(1, 4),
                'name' => 'Клиент #'.$i,
                'email' => "client$i@gmail.com",
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => \Illuminate\Support\Facades\Hash::make("qwe$i"),
            ];
        endfor;

        DB::table('users')->insert($collection);
    }

}
