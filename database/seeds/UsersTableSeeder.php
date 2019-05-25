<?php

use Illuminate\Database\Seeder;

// use Illuminate\Support\Str;
// use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
        	[
        		'name' => str_random(10),
        		'email' => str_random(10).'@gmail.com',
        		'password' => bcrypt('secret')
        	],
        	[
        		'name' => str_random(10),
        		'email' => str_random(10).'@gmail.com',
        		'password' => bcrypt('secret')
        	],
        	[
        		'name' => str_random(10),
        		'email' => str_random(10).'@gmail.com',
        		'password' => bcrypt('secret')
        	],
        ];
        DB::table('users')->insert($users);
    }
}
