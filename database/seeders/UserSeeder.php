<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DateTime;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'name' => 'a',
                'email' => 'a@a',
                'password'=> Hash::make('password'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'sport_id' => 1,
                'prefecture_id' => 1,
                'img_path'=>'a',
                'comment'=>'a',
        ]);
    }
}
