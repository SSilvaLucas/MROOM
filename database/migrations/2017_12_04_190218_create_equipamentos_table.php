<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipamentosTable extends Migration{

    public function up(){
        Schema::create('equipamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero_equipamento');
            $table->date('ultima_manutencao');
            $table->string('imagem', 100)
                  ->nullable()
                  ->default('imgs/image-default.png');
            $table->string('descricao', 200);
            $table->integer('tipo_equipamentos_id')->unsigned();
            $table->integer('ambientes_id')->unsigned();
            $table->enum('status', ['indisponível', 'solicitada', 'disponível'])->default('disponível');
            $table->timestamps();

            $table->foreign('tipo_equipamentos_id')
                  ->references('id')
                  ->on('tipo_equipamentos');
            $table->foreign('ambientes_id')
                  ->references('id')
                  ->on('ambientes');
        });
    }


    public function down(){
        Schema::dropIfExists('equipamentos');
    }
}
