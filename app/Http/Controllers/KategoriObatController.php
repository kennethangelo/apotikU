<?php

namespace App\Http\Controllers;

use App\KategoriObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriObatController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = KategoriObat::all();
        return view('kategori.index', compact('data'));
    }

           /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daftarKategori()
    {
        //Cara 1 (Query Builder)
        $result = DB::table('kategoriobat AS ko')
                     ->join('obat AS o', 'ko.id' , '=', 'o.kategoriobat_id')
                     ->select('ko.id','ko.nama', DB::raw("SUM(o.harga) AS harga"))
                     ->groupBy('ko.id', 'ko.nama')
                     ->orderBy('harga', 'desc')
                     ->get();

        return view('kategori.index',['data' => $result]);
    }
}
