<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;


class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert([
                'name' => 'a所属のa',
                'comment' => 'a',
                'img_path' => 'a',
                'user_id' => 1,
                'rank' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('members')->insert([
                'name' => 'b所属のb',
                'comment' => 'b',
                'img_path' => 'b',
                'user_id' => 2,
                'rank' => 2,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
         DB::table('members')->insert([
                'name' => 'a所属のb',
                'comment' => 'b',
                'img_path' => 'b',
                'user_id' => 1,
                'rank' => 2,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('members')->insert([
                'name' => 'a所属のc',
                'comment' => 'b',
                'img_path' => 'b',
                'user_id' => 1,
                'rank' => 3,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
    
    }
}
