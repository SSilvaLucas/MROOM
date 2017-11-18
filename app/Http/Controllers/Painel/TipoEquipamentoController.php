<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\TipoEquipamento;

class TipoEquipamentoController extends Controller{

    private $tipoEquipamento;

    public function __construct(TipoEquipamento $tipoEquipamento){
      $this->tipoEquipamento = $tipoEquipamento;
    }



    public function index(TipoEquipamento $tipo){
        $tipos = $tipo->all();
        return view('painel.tipo-equipamento.index', compact('tipos'));
    }



    public function create(TipoEquipamento $tipo){
        $tipos = $tipo->all();
        return view('painel.tipo-equipamento.create', compact('tipos'));
    }



    public function store(Request $request){
        $dataForm = $request->all();

        if(!isset($dataForm['descricao']) || $dataForm['descricao'] == ''){
            $dataForm['descricao'] = 'Não há descrição';
        }

        $this->validate($request, $this->tipoEquipamento->rules, $this->tipoEquipamento->msg);
        $insert = $this->tipoEquipamento->create($dataForm);

        if($insert){
            return redirect('/configuracoes/tipos-equipamentos');
        }else{
            return redirect()->back();
        }
    }



    public function show($id){
    }



    public function edit($id){
        $tipo = $this->tipoEquipamento->find($id);
        return view('painel.tipo-equipamento.edit', compact('tipo'));
    }



    public function update(Request $request, $id){
        $dataForm = $request->all();
        $tipo = $this->tipoEquipamento->find($id);

        if(!isset($dataForm['descricao']) || $dataForm['descricao'] == ''){
            $dataForm['descricao'] = 'Não há descrição';
        }
        $this->validate($request, $this->tipoEquipamento->rules, $this->tipoEquipamento->msg);
        $update = $tipo->update($dataForm);

        if($update){
          return redirect('/configuracoes/tipos-equipamentos');
        }else{
          return redirect()->back();
        }
    }



    public function destroy($id){
        $tipo = $this->tipoEquipamento->find($id);

        $delete = $tipo->delete();

        if($delete){
          return redirect()->route('tipos-equipamentos.index');
        }else{
          return redirect()->route('tipos-equipamentos.edit', $id)->with(['errors' => 'Falha ao deletar']);
        }
    }
}
