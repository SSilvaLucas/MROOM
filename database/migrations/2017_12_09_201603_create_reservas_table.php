<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration{

    public function up(){
        Schema::create('reservas', function (Blueprint $table) {
          $table->increments('id');
          $table->date('data_solicitacao');
          $table->date('data_inicio');
          $table->date('data_fim');
          $table->string('descricao', 200);
          $table->enum('status', ['finalizada', 'solicitada', 'confirmada', 'recusada'])->default('solicitada');
          $table->integer('ambiente_id')->unsigned();
          $table->integer('user_id')->unsigned();
          $table->integer('horario_inicio_id')->unsigned();
          $table->integer('horario_fim_id')->unsigned();
          $table->timestamps();

          $table->foreign('ambiente_id')
                ->references('id')
                ->on('ambientes');
          $table->foreign('user_id')
                ->references('id')
                ->on('users');
          $table->foreign('horario_inicio_id')
                ->references('id')
                ->on('horarios');
          $table->foreign('horario_fim_id')
                ->references('id')
                ->on('horarios');
        });
    }


    public function down(){
        Schema::dropIfExists('reservas');
    }
}
