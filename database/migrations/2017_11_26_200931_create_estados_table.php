<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadosTable extends Migration{

    public function up(){
        Schema::create('estados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 100)->unique();
            $table->string('sigla', 3)->unique();
            $table->integer('pais_id')->unsigned();
            $table->timestamps();

            $table->foreign('pais_id')->references('id')->on('pais')->onDelete('cascade');
        });
    }

    public function down(){
        Schema::dropIfExists('estados');
    }
}
