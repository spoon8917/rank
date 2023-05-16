<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DateTime;
use Illuminate\Support\Facades\DB;
class SportSeeder extends Seeder
{
    public function run()
    {
        DB::table('sports')->insert([
            'name' => 'tennis',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('sports')->insert([
            'name' => 'soccer',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
