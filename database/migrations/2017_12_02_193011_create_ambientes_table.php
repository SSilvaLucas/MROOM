<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmbientesTable extends Migration{

    public function up(){
        Schema::create('ambientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 20)->unique();
            $table->integer('capacidade')
                  ->unsigned()
                  ->default(0);
            $table->string('imagem', 100)
                  ->nullable()
                  ->default('imgs/image-default.png');
            $table->string('descricao', 200);
            $table->integer('tipo_ambientes_id')->unsigned();
            $table->integer('setores_id')->unsigned();
            $table->timestamps();

            $table->foreign('tipo_ambientes_id')
                  ->references('id')
                  ->on('tipo_ambientes')
                  ->onDelete('cascade');
            $table->foreign('setores_id')
                  ->references('id')
                  ->on('setores')
                  ->onDelete('cascade');
        });
    }


    public function down(){
        Schema::dropIfExists('ambientes');
    }
}
