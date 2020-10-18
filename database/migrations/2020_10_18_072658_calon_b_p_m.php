<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CalonBPM extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calonbpm', function (Blueprint $table) {
            $table->increments('idcalonbpm'); 
            $table->string('calon_slogan')->nullable();
            $table->string('calon_nourut')->nullable();
            $table->string('calon_npmcalon')->nullable();
            $table->string('calon_namacalon')->nullable();  
            $table->integer('calon_angkatancalon')->nullable();       
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
        Schema::dropIfExists('calonbpm');
    }
}
