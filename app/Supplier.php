<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public $timestamps = false;

    public function obats(){
        return $this->hasMany('App\Obat','suppliers_id');
    }
}
