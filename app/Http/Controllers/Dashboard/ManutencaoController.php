<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dashboard\Manutencao;
use App\Models\Dashboard\Equipamento;
use Auth;

class ManutencaoController extends Controller{

    private $manutencao;

    public function __construct(Manutencao $manutencao){
        $this->manutencao = $manutencao;
    }

    public function index(Manutencao $manutencao){
        $manutencoes = $manutencao->all();
        return view('dashboard.manutencao.index', compact('manutencoes'));
    }


    public function create(Manutencao $manutencao, Equipamento $equipamento){
        $manutencoes  = $manutencao->all();
        $equipamentos = $equipamento->all();
        return view('dashboard.manutencao.create', compact('manutencoes','equipamentos'));
    }


    public function store(Request $request, Manutencao $manutencao){
        $manutencao->data_solicitacao = date('Y-m-d');
        $manutencao->descricao_problema = $request->descricao_problema;
        $manutencao->equipamento_id = $request->equipamento_id;
        $manutencao->user_id = Auth::user()->id;

        $this->validate($request, $this->manutencao->rules, $this->manutencao->msg);
        $insert = $manutencao->save();

        if($insert){
            return redirect('/manutencoes');
        }else{
            return redirect()->back();
        }
    }
    public function concluir($id, Equipamento $equipamento){
      
    }

    public function updateStatus(Request $request, $id){

    }


    public function edit($id, Equipamento $equipamento){
        $manutencao   = $this->manutencao->find($id);
        $equipamentos = $equipamento->all();
        return view('dashboard.manutencao.edit', compact('manutencao','equipamentos'));
    }


    public function update(Request $request, $id){
        $dataForm   = $request->all();
        $manutencao = $this->manutencao->find($id);

        $this->validate($request, $this->manutencao->rules, $this->manutencao->msg);
        $update = $manutencao->update($dataForm);

        if($update){
          return redirect('/manutencoes');
        }else{
          return redirect()->back();
        }
    }


    public function destroy($id){
        $manutencao = $this->manutencao->find($id);
        $delete     = $manutencao->delete();

        if($delete){
          return redirect()->route('manutencoes.index');
        }else{
          return redirect()->route('manutencoes.edit', $id)->with(['errors' => 'Falha ao deletar']);
        }
    }
}
