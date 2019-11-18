<?php

use Illuminate\Database\Seeder;

class ComponentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('components')->insert([
            [
                'name' => 'header_phone_1',
                'value' => '+3809777111222',
                'image' => null,
                'page_name' => 'home',
            ],
            [
                'name' => 'header_phone_2',
                'value' => '+38097555555511',
                'image' => null,
                'page_name' => 'home',
            ],
            [
                'name' => 'header_slider_image',
                'value' => null,
                'image' => 'https://media.proglib.io/posts/2019/09/17/6c7ff19751dfbb250038041ea041f97c.jpg',
                'page_name' => 'home',
            ],
            [
                'name' => 'header_slider_title',
                'value' => 'Hello World Motherfucker Epta!',
                'image' => null,
                'page_name' => 'home',
            ],
            [
                'name' => 'text_user_text',
                'value' => 'Какойто текст ку-дато ЖЖЖЖжжжж-жжжж))',
                'image' => null,
                'page_name' => 'user',
            ],
        ]);
    }
}
