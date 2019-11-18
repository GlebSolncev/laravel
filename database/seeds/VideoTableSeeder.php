<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('videos')->insert([
            [
                'id' => 1,
                'src' => 'https://www.w3schools.com/tags/mov_bbb.mp4',
                'name' => 'Здравуйте!',
                'src_image' => 'https://i.all3dp.com/cdn-cgi/image/fit=cover,w=1284,h=722,gravity=0.5x0.5,format=auto/wp-content/uploads/2018/12/28144052/background-images-can-come-in-handy-when-modeling-tian-ooi-all3dp-181228.jpg',
                'content' => 'Описание для данного дерьма. Бесплатно нищеброд!',
                'status' => true,
                'premium' => false,
            ],
            [
                'id' => 2,
                'src' => 'https://static.pexels.com/lib/videos/free-videos.mp4',
                'name' => 'Епта бла',
                'src_image' => 'https://cdn.pixabay.com/photo/2018/05/28/22/11/message-in-a-bottle-3437294__340.jpg',
                'content' => 'Присел на пенёк. Посмотрел это дерьмо и заплатил ?',
                'status' => true,
                'premium' => true,
            ],
        ]);
    }


    #
}
