<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaisTable extends Migration{

    public function up(){
        Schema::create('pais', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 50)->unique();
            $table->timestamps();
        });
    }



    public function down(){
        Schema::dropIfExists('pais');
    }
}
