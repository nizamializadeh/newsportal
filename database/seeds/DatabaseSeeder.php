<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Nizami',
            'email' => 'nizamializade85@gmail.com',
            'role' => '1',
            'accept' => '1',
            'password' => bcrypt('nizami'),
        ]);
    }
}
