<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoriobat')->insert([
            ["nama"=>"Batuk"],
            ["nama"=>"Mata"],
            ["nama"=>"Nyeri Otot"],
           ]);
    }
}
