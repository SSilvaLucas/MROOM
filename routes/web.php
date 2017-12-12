<?php

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function(){

  Route::resource('/equipamentos','EquipamentosController');

  Route::group(['namespace' => 'Painel'], function(){
      Route::resource('/configuracoes/tipos-equipamentos', 'TipoEquipamentoController');

      Route::resource('/configuracoes/tipos-ambientes', 'TipoAmbienteController');

      Route::resource('/configuracoes/status-reservas', 'StatusReservaController');

      Route::resource('/configuracoes/horarios', 'HorarioController');

      Route::resource('/configuracoes/setores', 'SetorController');

      Route::resource('/configuracoes/ddds', 'DddController');

      Route::resource('/configuracoes/paises', 'PaisController');

      Route::resource('/configuracoes/estados', 'EstadoController');

      Route::resource('/configuracoes/cidades', 'CidadeController');

      Route::get('configuracoes', function () {
          return view('/painel/index');
      });

  });

  Route::group(['namespace' => 'Dashboard'], function(){
      Route::resource('/ambientes', 'AmbienteController');

      Route::resource('/equipamentos', 'EquipamentoController');

      Route::resource('/manutencoes', 'ManutencaoController');

      Route::post('/reservas/confirmar', 'ReservaController@confirmar');

      Route::post('/reservas/recusar', 'ReservaController@recusar');

      Route::resource('/reservas', 'ReservaController');

      Route::post('/reservas/solicita', 'ReservaController@solicita');

  });

});


Auth::routes();

Route::group(['namespace' => 'Auth'], function(){
    Route::resource('/registrar', 'RegisterController');
});

Route::get('/home', 'HomeController@index')->name('home');
