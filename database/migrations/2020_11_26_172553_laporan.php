<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Laporan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->increments('idlaporan'); 
            $table->string('laporan_pelapor')->nullable();
            $table->string('laporan_terlapor')->nullable(); 
            $table->text('laporan_isi')->nullable(); 
            $table->tinyInteger('laporan_status')->default(0)->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    { 
        Schema::dropIfExists('setting');
    }
}
