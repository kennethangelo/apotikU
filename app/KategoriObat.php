<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriObat extends Model
{
    protected $table = 'kategoriobat160419144';
    
    public function obats(){
        return $this->hasMany('App\Obat','kategoriobat160419144_id');
    }
}
