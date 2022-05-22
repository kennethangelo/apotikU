<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Edit Supplier</h4>
</div>
<div class="modal-body">
    <div class="form-body">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="eNama" class="form-control" value="{{$data->nama}}">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="eAlamat" rows="3" class="form-control">{{$data->alamat}}</textarea>
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary" data-dismiss="modal" onclick="saveDataUpdateTD({{$data->id}})">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
    </div>
</div>
