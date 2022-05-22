<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Edit Obat</h4>
</div>
<div class="modal-body">
    <div class="form-body">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="eNama" name="nama" placeholder="Masukkan nama" value="{{$data->nama_obat}}">
        </div>
        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" class="form-control" id="eStok" name="stok" placeholder="Masukkan stok" value="{{$data->stok}}">
        </div>
        <div class="form-group">
            <label for="harga">Harga (dalam Rupiah)</label>
            <input type="number" class="form-control" id="eHarga" name="harga" placeholder="Masukkan harga" value="{{$data->harga}}">
        </div>
        <div class="form-group">
            <label for="btnKategori">Kategori</label>
            <select id="eKategori" name="kategori" class="form-control">
                @foreach($kategori as $k)
                <option value="{{$k->id}}" {{($k->id == $data->kategoriobat_id)? 'selected' : ''}}>{{$k->nama}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="btnSupplier">Supplier</label>
            <select id="eSupplier"  name="supplier" class="form-control">
                @foreach($supplier as $s)
                <option value="{{$s->id}}" {{($s->id == $data->suppliers_id)? 'selected' : ''}}>{{$s->nama}}</option>
                @endforeach
            </select>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" data-dismiss="modal" onclick="saveDataUpdateTD({{$data->id}})">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
    </div>
</div>