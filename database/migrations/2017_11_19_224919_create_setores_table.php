<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetoresTable extends Migration{

    public function up(){
        Schema::create('setores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 50);
            $table->string('descricao', 200);
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('setores');
    }
}
