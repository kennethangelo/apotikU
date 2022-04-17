@extends('layout.adminlte')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Daftar Transaksi</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Pembeli</th>
                                    <th>Kasir</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$d->id}}</td>
                                    <td>{{$d->buyer->name}}</td>
                                    <td>{{$d->user->name}}</td>
                                    <td>{{$d->transaction_date}}</td>
                                    <td><a class="btn btn-default" data-toggle="modal" href="#basic" onClick="getDetailData({{$d->id}});">Lihat Rincian Pembelian</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

@section('jquery')
<script>
    function getDetailData(id){
        $.ajax({
            type:'POST',
            url:'{{route("transaksi.showAjax")}}',
            data:'_token=<?php echo csrf_token() ?> &id='+id,
            success: function(data){
                $('#msg').html(data.msg);
            }
        });
    }
</script>
@endsection