<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Horario;

class HorarioController extends Controller{

    private $horario;

    public function __construct(Horario $horario){
        $this->horario = $horario;
    }

    public function index(Horario $horario){
        $horarios = $horario->all();
        return view('painel.horario.index', compact('horarios'));
    }

    public function create(Horario $horario){
        $horarios = $horario->all();
        return view('painel.horario.create', compact('horarios'));
    }

    public function store(Request $request){
        $dataForm = $request->all();

        $this->validate($request, $this->horario->rules, $this->horario->msg);
        $insert = $this->horario->create($dataForm);

        if($insert){
            return redirect('/configuracoes/horarios');
        }else{
            return redirect()->back();
        }
    }



    public function show($id){

    }



    public function edit($id){
        $horarios = $this->horario->find($id);
        return view('painel.horario.edit', compact('horarios'));
    }

    public function update(Request $request, $id){
        $dataForm = $request->all();
        $horario = $this->horario->find($id);

        if(!isset($dataForm['descricao']) || $dataForm['descricao'] == ''){
            $dataForm['descricao'] = 'Não há descrição';
        }
        $this->validate($request, $this->horario->rules, $this->horario->msg);
        $update = $horario->update($dataForm);

        if($update){
          return redirect('/configuracoes/horarios');
        }else{
          return redirect()->back();
        }
    }

    public function destroy($id){
        $horario = $this->horario->find($id);

        $delete = $horario->delete();

        if($delete){
          return redirect()->route('horarios.index');
        }else{
          return redirect()->route('horarios.edit', $id)->with(['errors' => 'Falha ao deletar']);
        }
    }
}
