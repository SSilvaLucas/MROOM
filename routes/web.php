<?php

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/equipamentos','EquipamentosController');

Route::group(['namespace' => 'Painel'], function(){
    Route::resource('/configuracoes/tipos-equipamentos', 'TipoEquipamentoController');
    Route::post('/configuracoes/tipos-equipamentos/store', 'TipoEquipamentoController@store');

    Route::resource('/configuracoes/tipos-ambientes', 'TipoAmbienteController');
});
