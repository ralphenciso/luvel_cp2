<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'firstname' => 'admin',
            'lastname' => 'admin',
            'email' => 'admin@lux.com',
            'isAdmin' => true,
            'password' => bcrypt('admin123!')
        ]);

        DB::table('users')->insert([
          'username' => 'renciso',
          'firstname' => 'ralph',
          'lastname' => 'enciso',
          'email' => 'renciso@lux.com',
          'isAdmin' => false,
          'password' => bcrypt('renciso123!')
        ]);
    }
}
