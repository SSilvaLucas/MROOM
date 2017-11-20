<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDddsTable extends Migration{

    public function up(){
        Schema::create('ddds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ddd', 3)->unique();
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('ddds');
    }
}
