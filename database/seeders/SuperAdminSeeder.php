<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(['role_id'=>1,
                                    'full_name'=>'Super Admin',
                                    'email'=>'superadmin@gmail.com',
                                    'phone'=>12345678234,
                                    'password'=>\Hash::make('12345678'),
                                    'created_at'=> date("Y-m-d:H:m:s")]);
        
    }
}
