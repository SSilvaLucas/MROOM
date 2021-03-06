<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosTable extends Migration{

    public function up(){
        Schema::create('horarios', function (Blueprint $table){
            $table->increments('id');
            $table->time('horario')->unique();
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('horarios');
    }
}
