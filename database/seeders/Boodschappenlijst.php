<?php

namespace Database\Seeders;

use App\Models\Boodschaplijst;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Boodschappenlijst extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('boodschappenlijst')->insert([
            'id' => null,
            'order_id' => 1,
            'item_id' => 1,
            'count'   =>  3
        ]);
        DB::table('boodschappenlijst')->insert([
            'id' => null,
            'order_id' => 1,
            'item_id' => 2,
            'count'   =>  3
        ]);
    }
}
