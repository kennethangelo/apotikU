<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat';
    public $timestamps = false;
    
    public function kategori(){
        return $this->belongsTo('App\KategoriObat','kategoriobat_id');
    }

    public function supplier(){
        return $this->belongsTo('App\Supplier','suppliers_id');
    }
}
