<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManutencaosTable extends Migration{

    public function up(){
        Schema::create('manutencaos', function (Blueprint $table) {
          $table->increments('id');
          $table->date('data_solicitacao');
          $table->date('data_conclusao')->nullable();
          $table->string('descricao_problema', 200);
          $table->string('descricao_conclusao', 200)->nullable();
          $table->enum('status', ['finalizada', 'solicitada'])->default('solicitada');
          $table->integer('equipamento_id')->unsigned();
          $table->integer('user_id')->unsigned();
          $table->timestamps();

          $table->foreign('equipamento_id')
                ->references('id')
                ->on('equipamentos');
          $table->foreign('user_id')
                ->references('id')
                ->on('users');
      });
    }


    public function down(){
        Schema::dropIfExists('manutencaos');
    }
}
