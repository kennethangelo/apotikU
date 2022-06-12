@extends('layout.adminlte')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">List Obat</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="btn btn-info" type="button" href="{{route('obat.create')}}">+ Tambah obat baru</a></li>
                    <li class="breadcrumb-item"><a class="btn btn-info" type="button" href="#modalCreate" data-toggle="modal">+ Obat Baru (modal)</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="modalContent">
        </div>
    </div>
</div>

<section class="content">
    <div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add New Obat</h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="{{url('obat')}}" method="post">
                        @csrf
                        <div class="form-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan nama">
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="number" class="form-control" name="stok" placeholder="Masukkan stok">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga (dalam Rupiah)</label>
                                <input type="number" class="form-control" name="harga" placeholder="Masukkan harga">
                            </div>
                            <div class="form-group">
                                <label for="btnKategori">Kategori</label>
                                <select name="kategori" class="form-control">
                                    @foreach($kategori as $k)
                                    <option value="{{$k->id}}">{{$k->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="btnSupplier">Supplier</label>
                                <select name="supplier" class="form-control">
                                    @foreach($supplier as $s)
                                    <option value="{{$s->id}}">{{$s->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
    @endif

    <div class="alert alert-success" id="pesan" style="display:none;">
        {{session('status')}}
    </div>

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
                                    <th>Nama Obat</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Nama Kategori Obat</th>
                                    <th>Nama Supplier Obat</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr id="tr_{{$d->id}}">
                                    <td>{{$d->id}}</td>
                                    <td class="editable" id="td_nama_{{$d->id}}">{{$d->nama_obat}}</td>
                                    <td class="editable" id="td_stok_{{$d->id}}">{{$d->stok}}</td>
                                    <td class="editable" id="td_harga_{{$d->id}}">Rp{{number_format($d->harga)}}</td>
                                    <td id="td_kategori_{{$d->id}}">{{$d->kategori->nama}}</td>
                                    <td id="td_supplier_{{$d->id}}">{{$d->supplier->nama}}</td>
                                    <td id="td_gambar_{{$d->id}}"><img height='100px' src="{{ asset('img/obat/'.$d->gambar)}}">
                                        <div class="modal fade" id="modalChange_{{$d->id}}" tabindex="-1" role="basic" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title">Change Image</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form role="form" enctype="multipart/form-data" action="{{route('obat.changeImage')}}" method="POST">
                                                            @csrf
                                                            <div class="form-body">
                                                                <div class="form-group">
                                                                    <label for="name">Image</label>
                                                                    <input type="file" name="image" id="image" class="form-control" />
                                                                    <input type="hidden" name="id" id="id" value="{{$d->id}}" />
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-info">Submit</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div><br>

                                        <a href="#modalChange_{{$d->id}}" data-toggle="modal" class="btn btn-warning">Change Image</a>
                                    </td>
                                    <td><a type="button" class="btn btn-info" href="{{route('obat.edit', $d->id)}}">Edit</a>
                                        <a type="button" href="#modalEdit" data-toggle="modal" class="btn btn-warning" onclick="getEditForm({{$d->id}})">Edit A</a>
                                        <a type="button" href="#modalEdit" data-toggle="modal" class="btn btn-warning" onclick="getEditForm2({{$d->id}})">Edit B</a>
                                        <form action="{{route('obat.destroy', $d->id)}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <input type="submit" value="Delete" class="btn btn-danger" onclick="if(!confirm('Are you sure to delete this record?')) return false;">
                                            <a class="btn btn-danger" onclick="if(confirm('Are you sure to delete this record?')) deleteDataRemoveTR({{$d->id}})">Delete 2</a>
                                        </form>
                                    </td>
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
    function getEditForm(id) {
        $.ajax({
            type: 'POST',
            url: '{{route("obat.getEditForm")}}',
            data: {
                '_token': '<?php echo csrf_token() ?>',
                'id': id
            },
            success: function(data) {
                $('#modalContent').html(data.msg);
            }
        });
    }

    function getEditForm2(id) {
        $.ajax({
            type: 'POST',
            url: '{{route("obat.getEditForm2")}}',
            data: {
                '_token': '<?php echo csrf_token() ?>',
                'id': id
            },
            success: function(data) {
                $('#modalContent').html(data.msg);
            }
        });
    }

    function deleteDataRemoveTR(id) {
        $.ajax({
            type: 'POST',
            url: '{{route("obat.deleteData")}}',
            data: {
                '_token': '<?php echo csrf_token() ?>',
                'id': id
            },
            success: function(data) {
                if (data.status == "oke") {
                    alert(data.msg);
                    $("#tr_" + id).remove();
                } else {
                    alert(data.msg);
                }
            }
        });
    }

    function saveDataUpdateTD(id) {
        var eNama = $('#eNama').val();
        var eStok = $('#eStok').val();
        var eHarga = $('#eHarga').val();
        var idKategori = $("#eKategori").val();
        var idSupplier = $("#eSupplier").val();
        var eNamaKategoriObat = $('#eKategori :selected').text();
        var eNamaSupplier = $('#eSupplier :selected').text();

        $.ajax({
            type: 'POST',
            url: '{{route("obat.saveData")}}',
            data: {
                '_token': '<?php echo csrf_token() ?>',
                'id': id,
                'nama_obat': eNama,
                'stok': eStok,
                'harga': eHarga,
                'kategori': idKategori,
                'supplier': idSupplier
            },
            success: function(data) {
                if (data.status == "oke") {
                    $("#td_nama_" + id).html(eNama);
                    $("#td_stok_" + id).html(eStok);
                    $("#td_harga_" + id).html(eHarga);
                    $("#td_kategori_" + id).html(eNamaKategoriObat);
                    $("#td_supplier_" + id).html(eNamaSupplier);
                    $("#pesan").show();
                    $("#pesan").html(data.msg);
                }
            }
        });
    }

    $(".editable").editable({
        closeOnEnter: true,
        callback: function(data) {
            var s_id = data.$el[0].id
            var fname = s_id.split('_')[1]
            var id = s_id.split('_')[2]
            $.ajax({
                type: 'POST',
                url: '{{route("obat.saveDataField")}}',
                data: {
                    '_token': '<?php echo csrf_token() ?>',
                    'id': id,
                    'fname': fname,
                    'value': data.content
                },
                success: function(data) {
                    alert(data.msg)
                }
            });
        }
    });
</script>
@endsection