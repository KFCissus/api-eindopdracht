<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artikelen')->insert([
            'id' =>null,
            'name'=>'appel',
            'prijs'=> 2
        ]);
        DB::table('artikelen')->insert([
            'id' =>null,
            'name'=>'banaan',
            'prijs'=> 3
        ]);
    }
}
