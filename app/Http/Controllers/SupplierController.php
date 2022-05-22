<?php

namespace App\Http\Controllers;

use App\Buyer;
use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Supplier::all();
        return view('supplier.index', ['data' => $result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("supplier.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Supplier();
        $data->nama = $request->get('nama');
        $data->alamat = $request->get('alamat');
        $data->save();

        return redirect()->route('supplier.index')->with('status', 'Supplier is added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
       $data = $supplier;
       return view('supplier.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $supplier->nama = $request->get('nama');
        $supplier->alamat = $request->get('alamat');
        $supplier->save();
        return redirect()->route('supplier.index')->with('status', 'Supplier data is changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //Handle try and catch because the supplier is related with some data in Medicine table.
        try{
            $supplier->delete();
            return redirect()->route('supplier.index')->with('status',  'Data supplier berhasil dihapus');
        } catch (\PDOException $e){
            $msg = "Data gagal dihapus. Pastikan data child sudah hilang atau tidak berhubungan.";
            return redirect()->route('supplier.index')->with('error', $msg);
        }
    }

    public function getEditForm(Request $request){
        $id = $request->get('id');
        $data = Supplier::find($id);
        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('supplier.getEditForm',compact('data'))->render()
        ),200);
    }

    public function getEditForm2(Request $request){
        $id = $request->get('id');
        $data = Supplier::find($id);
        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('supplier.getEditForm2',compact('data'))->render()
        ),200);
    }

    public function saveData(Request $request){
        $id = $request->get('id');
        $data = Supplier::find($id);
        $data->nama = $request->get('nama');
        $data->alamat = $request->get('alamat');
        $data->save();

        return response()->json(array(
            'status'=>'oke',
            'msg'=>"Supplier data has been updated!"
        ),200);
    }

    public function deleteData(Request $request){
        try{
            $id = $request->get('id');
            $data = Supplier::find($id);
            $data->delete();
    
            return response()->json(array(
                'status'=>'oke',
                'msg'=>"Supplier data has been deleted!"
            ),200);
        } catch (\PDOException $e){
            return response()->json(array(
                'status'=>'error',
                'msg'=>'Supplier is not deleted. It may be used in the product'
            ),200);
        }
     
    }
}
