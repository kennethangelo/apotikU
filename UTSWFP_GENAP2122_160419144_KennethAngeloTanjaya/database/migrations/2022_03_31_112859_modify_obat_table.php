<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyObatTable extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('obat160419144', function (Blueprint $table) {
            $table->foreign('kategoriobat160419144_id')->references('id')->on('kategoriobat160419144');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('obat160419144', function (Blueprint $table) {
            $table->dropForeign(['kategoriobat160419144_id']);
        });
    }
}
