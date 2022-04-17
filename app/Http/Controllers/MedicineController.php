<?php

namespace App\Http\Controllers;

use App\Obat;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listAllObat()
    {
        //Cara 1 (Query Builder)
        $result = DB::table('medicines AS o')
            ->join("categories AS ko", 'ko.id', '=', 'o.categories_id')
            ->select('o.id', 'o.nama_obat', 'o.stok', 'o.harga', 'ko.nama')
            ->get();

        return view('list_obat', ['data' => $result]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listObatBatuk()
    {
        //Cara 1 (Query Builder)
        $result = DB::table('medicines AS o')
            ->join("categories AS ko", 'ko.id', '=', 'o.categories_id')
            ->select('o.id', 'o.nama_obat', 'o.stok', 'o.harga', 'ko.nama')
            ->where('ko.nama', '=', 'Batuk')
            ->get();
            
        return view('obat_batuk', ['data' => $result]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function stokObatTerbanyak()
    {
        //Cara 1 (Query Builder)
        $result = DB::table('medicines')
            ->orderBy('stok', 'desc')
            ->limit(1)
            ->get();

        return view('stok_obat_banyak', ['data' => $result]);
    }
}
