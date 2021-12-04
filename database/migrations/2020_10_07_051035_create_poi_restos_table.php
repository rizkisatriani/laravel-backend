<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoiRestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poi_restos', function (Blueprint $table) {
            $table->id();
            $table->string('nama_resto');
            $table->string('keterangan');
            $table->string('alamat');
            $table->string('coordinat'); 
            $table->integer('status'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poi_restos');
    }
}
