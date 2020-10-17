<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pemilih extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemilih', function (Blueprint $table) {
            $table->increments('idpemilih');
            $table->string('pemilih_npm')->nullable();
            $table->string('pemilih_nama')->nullable(); 
            $table->string('pemilih_email')->nullable();  
            $table->integer('pemilih_angkatan')->nullable();   
            $table->integer('pemilih_pilihan')->nullable();    
            $table->string('pemilih_secretcode')->nullable();   
            $table->tinyInteger('pemilih_status')->default(0);  
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
        Schema::dropIfExists('angkatan');
    }
}
