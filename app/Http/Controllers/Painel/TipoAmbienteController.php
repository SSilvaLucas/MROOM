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



    public function create(TipoAmbiente $tipo){
        $tipos = $tipo->all();
        return view('painel.tipo-ambiente.create', compact('tipos'));
    }



    public function store(Request $request){
      $dataForm = $request->all();

      if(!isset($dataForm['descricao']) || $dataForm['descricao'] == ''){
          $dataForm['descricao'] = 'Não há descrição';
      }

      $this->validate($request, $this->tipoAmbiente->rules, $this->tipoAmbiente->msg);
      $insert = $this->tipoAmbiente->create($dataForm);

      if($insert){
          return redirect('/configuracoes/tipos-ambientes');
      }else{
          return redirect()->back();
      }
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
