<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Suara extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suara', function (Blueprint $table) {
            $table->increments('idsuara'); 
            $table->integer('suara_calidbem')->nullable();
            $table->integer('suara_calidbpm')->nullable();
            $table->string('suara_idpemilih')->nullable();
            $table->date('suara_tanggal')->nullable();  
            $table->string('suara_jam')->nullable();      
            $table->string('suara_secretcode')->nullable();    
            $table->string('suara_cookies')->nullable();    
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
        Schema::dropIfExists('suara');
    }
}
