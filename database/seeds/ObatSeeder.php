<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('obat')->insert([
            ["nama_obat"=>"Obat Batuk Woods", "stok"=>1, "harga"=>10000, "kategoriobat_id"=>1, "suppliers_id"=>1],
            ["nama_obat"=>"Obat Batuk Siladex", "stok"=>2, "harga"=>15000, "kategoriobat_id"=>1, "suppliers_id"=>2],
            ["nama_obat"=>"Obat Batuk OBH", "stok"=>3, "harga"=>20000, "kategoriobat_id"=>1, "suppliers_id"=>1],
            ["nama_obat"=>"Obat Batuk Takabb", "stok"=>4, "harga"=>25000, "kategoriobat_id"=>1, "suppliers_id"=>2],
            ["nama_obat"=>"Obat Batuk Konidin", "stok"=>5, "harga"=>30000, "kategoriobat_id"=>1, "suppliers_id"=>1],

            ["nama_obat"=>"Rohto Eye Flush", "stok"=>2, "harga"=>15000, "kategoriobat_id"=>2, "suppliers_id"=>2],
            ["nama_obat"=>"Tetes Mata Rohto Cool", "stok"=>4, "harga"=>20000, "kategoriobat_id"=>2, "suppliers_id"=>1],
            ["nama_obat"=>"Insto Regular Drops", "stok"=>6, "harga"=>25000, "kategoriobat_id"=>2, "suppliers_id"=>2],
            ["nama_obat"=>"Cendo Cenfresh", "stok"=>8, "harga"=>30000, "kategoriobat_id"=>2, "suppliers_id"=>1],
            ["nama_obat"=>"Cendo EyeFresh", "stok"=>10, "harga"=>35000, "kategoriobat_id"=>2, "suppliers_id"=>2],

            ["nama_obat"=>"Oskadon SP", "stok"=>3, "harga"=>20000, "kategoriobat_id"=>3, "suppliers_id"=>1],
            ["nama_obat"=>"Sido Muncul Jamu Pegal Linu", "stok"=>5, "harga"=>25000, "kategoriobat_id"=>3, "suppliers_id"=>1],
            ["nama_obat"=>"Counterpain", "stok"=>7, "harga"=>30000, "kategoriobat_id"=>3, "suppliers_id"=>2],
            ["nama_obat"=>"Vitabiotics Jointace Gel", "stok"=>9, "harga"=>35000, "kategoriobat_id"=>3, "suppliers_id"=>2],
            ["nama_obat"=>"Fatigon", "stok"=>11, "harga"=>40000, "kategoriobat_id"=>3, "suppliers_id"=>1],
           ]);
    }
}
