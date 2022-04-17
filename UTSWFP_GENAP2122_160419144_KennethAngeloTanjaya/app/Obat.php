<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat160419144';
    
    public function kategori(){
        return $this->belongsTo('App\KategoriObat','id');
    }
}
