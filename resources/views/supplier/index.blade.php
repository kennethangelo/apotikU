@extends('layout.adminlte')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">List Supplier</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="btn btn-info" type="button" href="{{route('supplier.create')}}">+ Add new Supplier</a></li>
                    <li class="breadcrumb-item"><a class="btn btn-info" type="button" href="#modalCreate" data-toggle="modal">+ Supplier Baru (modal)</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add New Supplier</h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="{{url('supplier')}}" method="post">
                        @csrf
                        <div class="form-body">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="nama" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <textarea name="alamat" id="address" rows="3" class="form-control"></textarea>
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

    <div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modalContent">
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
                                    <th>Nama Supplier</th>
                                    <th>Alamat</th>
                                    <th>Logo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr id="tr_{{$d->id}}">
                                    <td>{{$d->id}}</td>
                                    <td class="editable" id="td_nama_{{$d->id}}">{{$d->nama}}</td>
                                    <td class="editable" id="td_alamat_{{$d->id}}">{{$d->alamat}}</td>
                                    <td id="td_logo_{{$d->id}}"><img height='50px' src="{{ asset('img/supplier/'.$d->logo)}}">
                                        <div class="modal fade" id="modalChange_{{$d->id}}" tabindex="-1" role="basic" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title">Change Logo</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form role="form" enctype="multipart/form-data" action="{{route('supplier.changeLogo')}}" method="POST">
                                                            @csrf
                                                            <div class="form-body">
                                                                <div class="form-group">
                                                                    <label for="name">Logo</label>
                                                                    <input type="file" name="logo" id="logo" class="form-control" />
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

                                        <a href="#modalChange_{{$d->id}}" data-toggle="modal" class="btn btn-warning">Change Logo</a>
                                    </td>
                                    <td><a type="button" class="btn btn-info" href="{{route('supplier.edit', $d->id)}}">Edit</a>
                                        <a type="button" href="#modalEdit" data-toggle="modal" class="btn btn-warning" onclick="getEditForm({{$d->id}})">Edit A</a>
                                        <a type="button" href="#modalEdit" data-toggle="modal" class="btn btn-warning" onclick="getEditForm2({{$d->id}})">Edit B</a>

                                        @can('delete-permission', $d)
                                            <form action="{{route('supplier.destroy', $d->id)}}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <input type="submit" value="Delete" class="btn btn-danger" onclick="if(!confirm('Are you sure to delete this record?')) return false;">
                                            </form>
                                            <a class="btn btn-danger" onclick="if(confirm('Are you sure to delete this record?')) deleteDataRemoveTR({{$d->id}})">Delete 2</a>
                                        @endcan
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
            url: '{{route("supplier.getEditForm")}}',
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
            url: '{{route("supplier.getEditForm2")}}',
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
            url: '{{route("supplier.deleteData")}}',
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
        var eAlamat = $('#eAlamat').val();
        $.ajax({
            type: 'POST',
            url: '{{route("supplier.saveData")}}',
            data: {
                '_token': '<?php echo csrf_token() ?>',
                'id': id,
                'nama': eNama,
                'alamat': eAlamat
            },
            success: function(data) {
                if (data.status == "oke") {
                    $("#td_nama_" + id).html(eNama);
                    $("#td_alamat_" + id).html(eAlamat);
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
                url: '{{route("supplier.saveDataField")}}',
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