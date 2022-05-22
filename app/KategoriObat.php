<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriObat extends Model
{
    protected $table = 'kategoriobat';
    
    public function obats(){
        return $this->hasMany('App\Obat','kategoriobat_id');
    }
}
