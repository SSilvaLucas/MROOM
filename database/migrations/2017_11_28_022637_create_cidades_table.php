<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCidadesTable extends Migration{

    public function up(){
        Schema::create('cidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 100)->unique();
            $table->integer('estado_id')->unsigned();
            $table->timestamps();

            $table->foreign('estado_id')
                  ->references('id')
                  ->on('estados')
                  ->onDelete('cascade');
        });
    }

    public function down(){
        Schema::dropIfExists('cidades');
    }
}
