<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Setore;

class SetorController extends Controller{
    private $setor;

    public function __construct(Setore $setor){
        $this->setor = $setor;
    }



    public function index(Setore $setor){
        $setores = $setor->all();
        return view('painel.setor.index', compact('setores'));
    }



    public function create(Setore $setor){
        $setores = $setor->all();
        return view('painel.setor.create', compact('setores'));
    }



    public function store(Request $request){
        $dataForm = $request->all();

        if(!isset($dataForm['descricao']) || $dataForm['descricao'] == ''){
            $dataForm['descricao'] = 'Não há descrição';
        }

        $this->validate($request, $this->setor->rules, $this->setor->msg);
        $insert = $this->setor->create($dataForm);

        if($insert){
            return redirect('/configuracoes/setores');
        }else{
            return redirect()->back();
        }
    }



    public function show($id){
    }



    public function edit($id){
        $setor = $this->setor->find($id);
        return view('painel.setor.edit', compact('setor'));
    }



    public function update(Request $request, $id){
        $dataForm = $request->all();
        $setor = $this->setor->find($id);

        if(!isset($dataForm['descricao']) || $dataForm['descricao'] == ''){
            $dataForm['descricao'] = 'Não há descrição';
        }
        $this->validate($request, $this->setor->rules, $this->setor->msg);
        $update = $setor->update($dataForm);

        if($update){
          return redirect('/configuracoes/setores');
        }else{
          return redirect()->back();
        }
    }



    public function destroy($id){
        $setor = $this->setor->find($id);

        $delete = $setor->delete();

        if($delete){
          return redirect()->route('setores.index');
        }else{
          return redirect()->route('setores.edit', $id)->with(['errors' => 'Falha ao deletar']);
        }
    }
}
