<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\TipoAmbiente;

class TipoAmbienteController extends Controller{

  private $tipoAmbiente;

  public function __construct(TipoAmbiente $tipoAmbiente){
    $this->tipoAmbiente = $tipoAmbiente;
  }

    public function index(TipoAmbiente $tipo){
        $tipos = $tipo->all();
        return view('painel.tipo-ambiente.index', compact('tipos'));
    }



    public function create(){
        //
    }



    public function store(Request $request){
        //
    }



    public function show($id){
        //
    }



    public function edit($id){
        //
    }



    public function update(Request $request, $id){

    }



    public function destroy($id){
        //
    }
}
