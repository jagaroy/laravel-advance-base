<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
        	[
        		'name' => Str::random(10),
        		'email' => Str::random(10).'@gmail.com',
        		'password' => bcrypt('secret')
        	],
        	[
        		'name' => Str::random(10),
        		'email' => Str::random(10).'@gmail.com',
        		'password' => bcrypt('secret')
        	],
        	[
        		'name' => Str::random(10),
        		'email' => Str::random(10).'@gmail.com',
        		'password' => bcrypt('secret')
        	],

        ];

        DB::table('admins')->insert($admins);
    }
}
