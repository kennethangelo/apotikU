<?php

namespace App\Http\Controllers;

use App\KategoriObat;
use App\Supplier;
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
    public function index()
    {
        $result = Obat::all();
        $supplier = Supplier::all();
        $kategori = KategoriObat::all();
        return view('obat.index', ['data' => $result, "kategori"=> $kategori, "supplier"=>$supplier]);
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = KategoriObat::all();
        $supplier = Supplier::all();
        return view("obat.create", ["kategori"=> $kategori, "supplier"=>$supplier]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Obat();
        $data->nama_obat = $request->get('nama');
        $data->stok = $request->get('stok');
        $data->harga = $request->get('harga');
        $data->kategoriobat_id = $request->get('kategori');
        $data->suppliers_id = $request->get('supplier');
        $data->save();

        return redirect()->route('obat.index')->with('status', 'Obat berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Obat  $Obat
     * @return \Illuminate\Http\Response
     */
    public function show(Obat $Obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Obat  $Obat
     * @return \Illuminate\Http\Response
     */
    public function edit(Obat $Obat)
    {
        $kategori = KategoriObat::all();
        $supplier = Supplier::all();
        return view('obat.edit', compact('Obat', 'kategori', 'supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Obat  $Obat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obat $Obat)
    {
        $Obat->nama_obat = $request->get('nama');
        $Obat->stok = $request->get('stok');
        $Obat->harga = $request->get('harga');
        $Obat->kategoriobat_id = $request->get('kategori');
        $Obat->suppliers_id = $request->get('supplier');
        
        $Obat->save();
        return redirect()->route('obat.index')->with('status', 'Obat berhasil diubah!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Obat  $Obat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obat $Obat)
    {
        try{
            $Obat->delete();
            return redirect()->route('obat.index')->with('status', 'Data obat berhasil dihapus!');
        } catch (\PDOException $e){
            $msg = "Data gagal dihapus. Pastikan data child sudah hilang atau tidak berhubungan.";
            return redirect()->route('obat.index')->with('error', $msg);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listObatBatuk()
    {
        //Cara 1 (Query Builder)
        $result = DB::table('obat AS o')
            ->join("kategoriobat AS ko", 'ko.id', '=', 'o.kategoriobat_id')
            ->select('o.id', 'o.nama_obat', 'o.stok', 'o.harga', 'ko.nama')
            ->where('ko.nama', '=', 'Batuk')
            ->get();
            
        return view('obat.obat_batuk', ['data' => $result]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function stokObatTerbanyak()
    {
        //Cara 1 (Query Builder)
        $result = DB::table('obat')
            ->orderBy('stok', 'desc')
            ->limit(1)
            ->get();
        return view('obat.stok_obat_banyak', ['data' => $result]);
    }

    public function getEditForm(Request $request){
        $id = $request->get('id');
        $data = Obat::find($id);
        $kategori = KategoriObat::all();
        $supplier = Supplier::all();
        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('obat.getEditForm',compact('data','kategori', 'supplier'))->render()
        ),200);
    }

    public function getEditForm2(Request $request){
        $id = $request->get('id');
        $data = Obat::find($id);
        $kategori = KategoriObat::all();
        $supplier = Supplier::all();
        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('obat.getEditForm2',compact('data','kategori', 'supplier'))->render()
        ),200);
    }

    public function saveData(Request $request){
        $id = $request->get('id');
        $data = Obat::find($id);
        $data->nama_obat = $request->get('nama_obat');
        $data->stok = $request->get('stok');
        $data->harga = $request->get('harga');
        $data->kategoriobat_id = $request->get('kategori');
        $data->suppliers_id = $request->get('supplier');
        $data->save();

        return response()->json(array(
            'status'=>'oke',
            'msg'=>"Obat data has been updated!"
        ),200);
    }

    public function deleteData(Request $request){
        try{
            $id = $request->get('id');
            $data = Obat::find($id);
            $data->delete();
    
            return response()->json(array(
                'status'=>'oke',
                'msg'=>"Obat data has been deleted!"
            ),200);
        } catch (\PDOException $e){
            return response()->json(array(
                'status'=>'error',
                'msg'=>'Obat is not deleted. It may be used in the product'
            ),200);
        }
     
    }
}
