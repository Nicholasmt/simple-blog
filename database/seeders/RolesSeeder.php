<?php

namespace Database\Seeders;
use DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(['title'=>'Super Admin','privilege'=>1]);
        DB::table('roles')->insert(['title'=>'Blog Admin','privilege'=>2]);
    }
}
