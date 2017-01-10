<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'name' => 'Pak Firdaus',
            'username' => 'firdaus',
            'password' => bcrypt('firdaus'),
        ]);

        DB::table('user')->insert([
            'name' => 'panti',
            'username' => 'panti',
            'password' => bcrypt('panti'),
        ]);
    }
}
