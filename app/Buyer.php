<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected $table = 'buyers';
    public function transactions(){
        return $this->hasMany('App\Transaction', 'buyer_id', 'id');
    }
}
