<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KlantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            'id' =>null,
            'name'=>'Chris',
            'email'=>'chris@email.com',
            'password'=>'12345678'
        ]);
    }
}
