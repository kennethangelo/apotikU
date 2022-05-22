@extends('layout.adminlte')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Form Tambah Supplier</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <form method="POST" action="{{route('supplier.store')}}">
      @csrf
      <div class="form-group">
        <label for="exampleInputEmail1">Nama</label>
        <input type="text" class="form-control" name="nama" placeholder="Masukkan nama">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Alamat</label>
        <textarea class="form-control" name="alamat" cols="10" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection