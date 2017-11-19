<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosTable extends Migration{

    public function up(){
        Schema::create('horarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('horas', 2)->unique();
            $table->string('minutos', 2)->unique();
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('horarios');
    }
}
