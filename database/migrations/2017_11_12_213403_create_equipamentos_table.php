<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipamentos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idEquipamento');
            // $table->integer('fkTipoEquipamento');
            // $table->integer('fkAmbiente');
            $table->integer('numeroEquipamento');
            $table->date('ultimaManutencao');
            $table->string('imagemEquipamento')->nullable($value = true);
            $table->string('descricao', 200)->nullable($value = true);
            $table->integer('manutencoesConcluídas');
            $table->timestamps();

            // $table->foreign('fkTipoEquipamento')
            //       ->references('idTipoEquipamento')
            //       ->on('tipo_equipamento');
            // $table->foreign('fkAmbiente')
            //       ->references('idAmbiente')
            //       ->on('ambiente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipamentos');
    }
}
