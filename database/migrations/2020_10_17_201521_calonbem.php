<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CalonBem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('calonbem', function (Blueprint $table) {
            $table->increments('idcalonbem');
            $table->string('calon_namapasangan')->nullable();
            $table->string('calon_slogan')->nullable();
            $table->string('calon_nourut')->nullable();
            $table->string('calon_npmketua')->nullable();
            $table->string('calon_namaketua')->nullable();  
            $table->integer('calon_angkatanketua')->nullable();   
            $table->string('calon_npmwakil')->nullable();
            $table->string('calon_namawakil')->nullable();  
            $table->integer('calon_angkatanwakil')->nullable();    
            $table->text('calon_biografi')->nullable();   
            $table->text('calon_prokervisimisi')->nullable();   
            $table->string('calon_pasfoto')->nullable();    
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
        Schema::dropIfExists('calonbem');
    }
}
