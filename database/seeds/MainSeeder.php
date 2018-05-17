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
        DB::table('main')->insert(['name' => 'title', 'value' => 'A3 - All About Aqua']);
        DB::table('main')->insert(['name' => 'short-title', 'value' => 'A3']);
        DB::table('main')->insert(['name' => 'admin', 'value' => 'bRexx']);
    }
}
