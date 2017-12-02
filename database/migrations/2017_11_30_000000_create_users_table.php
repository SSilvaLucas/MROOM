<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration{

    public function up(){
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 20);
            $table->string('sobrenome', 70);
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('telefone', 10);
            $table->string('cpf', 11)->unique();
            $table->integer('reservas_realizadas')
                  ->nullable()
                  ->default(0);
            $table->integer('manutencoes_solicitadas')
                  ->nullable()
                  ->default(0);
            $table->integer('ddds_id')->unsigned();
            $table->integer('setores_id')->unsigned();
            $table->integer('cidades_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('ddds_id')
                  ->references('id')
                  ->on('ddds')
                  ->onDelete('cascade');

            $table->foreign('setores_id')
                  ->references('id')
                  ->on('setores')
                  ->onDelete('cascade');

            $table->foreign('cidades_id')
                  ->references('id')
                  ->on('cidades')
                  ->onDelete('cascade');
        });
    }

    public function down(){
        Schema::dropIfExists('users');
    }
}
