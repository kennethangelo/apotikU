<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
       /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obat160419144', function (Blueprint $table) {
            $table->id();
            $table->string('nama_obat');
            $table->integer('stok');
            $table->integer('harga');
            $table->unsignedBigInteger('kategoriobat160419144_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obat160419144');
    }
}