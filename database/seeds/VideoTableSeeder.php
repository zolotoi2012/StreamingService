<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Minecraft is my life',
            'desc' => 'Minecraft',
            'src' => '/videos/video.mp4',
            'user_id' => 1
        ]);
    }
}
