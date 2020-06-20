<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profile')->insert([
            'user_id' => 1,
            'address' => 'Харькоский массив',
            'telegram' => 'www.linkedin.com/in/maxim-mamitko-a99337164/',
            'description' => 'This top channel',
            'name' => 'Maximalo4ka'
        ]);
    }
}
