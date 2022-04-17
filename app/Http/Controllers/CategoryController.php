<?php

namespace App\Http\Controllers;

use App\KategoriObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
           /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daftarKategori()
    {
        //Cara 1 (Query Builder)
        $result = DB::table('categories AS ko')
                     ->join('medicines AS o', 'ko.id' , '=', 'o.categories_id')
                     ->select('ko.id','ko.nama', DB::raw("SUM(o.harga) AS harga"))
                     ->groupBy('ko.id', 'ko.nama')
                     ->orderBy('harga', 'desc')
                     ->get();

        return view('daftar_kategori',['data' => $result]);
    }
}
