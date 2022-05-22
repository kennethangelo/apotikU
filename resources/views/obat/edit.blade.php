@extends('layout.adminlte')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Obat</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form method="POST" action="{{route('obat.update', $Obat->id)}}">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukkan nama" value="{{$Obat->nama_obat}}">
            </div>
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" class="form-control" name="stok" placeholder="Masukkan stok" value="{{$Obat->stok}}">
            </div>
            <div class="form-group">
                <label for="harga">Harga (dalam Rupiah)</label>
                <input type="number" class="form-control" name="harga" placeholder="Masukkan harga" value="{{$Obat->harga}}">
            </div>
            <div class="form-group">
                <label for="btnKategori">Kategori</label>
                <select name="kategori" class="form-control">
                    @foreach($kategori as $k)
                    <option value="{{$k->id}}" {{($k->id == $Obat->kategoriobat_id)? 'selected' : ''}}>{{$k->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="btnSupplier">Supplier</label>
                <select name="supplier" class="form-control">
                    @foreach($supplier as $s)
                    <option value="{{$s->id}}" {{($s->id == $Obat->suppliers_id)? 'selected' : ''}}>{{$s->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </div>

    </form>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection