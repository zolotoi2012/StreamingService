<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'image' => 'images/avatars/avatar.svg',
            'email' => 'maxim@admin.com',
            'password' => Hash::make('password'),
        ]);
    }
}
