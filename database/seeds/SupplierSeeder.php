<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([
           ["nama"=>"PT Kimia Farma", "alamat"=>"Jalan Raya Tenggilis No.95"],
           ["nama"=>"PT Jaya Farma", "alamat"=>"Jalan Raya Tenggilis No.15"],
           ["nama"=>"PT Bumame Indonesia", "alamat"=>"Jalan Raya Kalirungkut No.105"],
           ["nama"=>"PT Sumber Bahagia", "alamat"=>"Jalan Embong Malang No.100"]
        ]);
    }
}
