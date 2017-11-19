<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusReservasTable extends Migration{

    public function up(){
        Schema::create('status_reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 30)->unique();
            $table->string('descricao', 200);
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('status_reservas');
    }
}
