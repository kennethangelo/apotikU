<?php

namespace App\Http\Controllers;

use App\Obat;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listAllObat()
    {
        //Cara 1 (Query Builder)
        // $result = DB::table('obat160419144 AS o')
        //     ->join("kategoriobat160419144 AS ko", 'ko.id', '=', 'o.kategoriobat160419144_id')
        //     ->select('o.id', 'o.nama_obat', 'o.stok', 'o.harga', 'ko.nama')
        //     ->get();

        //Keluarkan obat batuk yang memiliki harga di atas Rp20000, jika tidak munculkan semua obat lainnya.
        $result = DB::table('obat160419144 AS o')
            ->join("kategoriobat160419144 AS ko", 'ko.id', '=', 'o.kategoriobat160419144_id')
            ->select('o.id', 'o.nama_obat', 'o.stok', 'o.harga', 'ko.nama')
            ->where([['ko.nama', '=', "Batuk"],
                    ['o.harga', '>', 20000]])
            ->orWhere('ko.nama', '!=', "Batuk")
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
        $result = DB::table('obat160419144 AS o')
            ->join("kategoriobat160419144 AS ko", 'ko.id', '=', 'o.kategoriobat160419144_id')
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
        $result = DB::table('obat160419144')
            ->orderBy('stok', 'desc')
            ->limit(1)
            ->get();
        return view('stok_obat_banyak', ['data' => $result]);
    }
}
