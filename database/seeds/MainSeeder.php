<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('main')->insert(['name' => 'title', 'value' => 'All About Aqua']);
        DB::table('main')->insert(['name' => 'short-title', 'value' => 'A3']);
        DB::table('main')->insert(['name' => 'admin', 'value' => 'bRexx']);

        DB::table('categories')->insert(['name' => 'Fish']);
        DB::table('categories')->insert(['name' => 'Aquarium']);
        DB::table('categories')->insert(['name' => 'Food']);
        DB::table('categories')->insert(['name' => 'Decoration']);
        DB::table('categories')->insert(['name' => 'Medicine']);
        DB::table('categories')->insert(['name' => 'Others']);

        for ($i = 0; $i < 38; $i++) {
            $rr = rand(1, 5);
            $ri = rand(25, 37);
            DB::table('ratings')->insert(['user_id' => '3', 'item_id' => $ri, 'rate' => $rr]);
        }

    }

}
