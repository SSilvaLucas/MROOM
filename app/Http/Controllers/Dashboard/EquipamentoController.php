<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Painel\TipoEquipamento;
use App\Models\Dashboard\Ambiente;
use App\Models\Dashboard\Equipamento;
use Image;

class EquipamentoController extends Controller{

    private $equipamento;

    public function __construct(Equipamento $equipamento){
        $this->equipamento = $equipamento;
    }

    public function index(Equipamento $equipamento){
        $equipamentos = $equipamento->all();
        return view('dashboard.equipamento.index', compact('equipamentos'));
    }



    public function create(Equipamento $equipamento, Ambiente $ambiente, TipoEquipamento $tipoEquipamento){
        $ambientes        = $ambiente->all();
        $tipoEquipamentos = $tipoEquipamento->all();
        $equipamentos     = $equipamento->all();
        return view('dashboard.equipamento.create', compact('ambientes','tipoEquipamentos', 'equipamentos'));
    }



    public function store(Request $request, Equipamento $equipamento){
        if($request->hasFile('file')){
          $file = $request->file('file');
          $nomeImagem = date('Y-m-d-H:i:s').'-'.$file->getClientOriginalName();
          $path = 'imgs/equipamentos/';
          $file->move($path, $nomeImagem);

          $equipamento->imagem = $path.$nomeImagem;

          $equipamento->numero_equipamento   = $request->numero_equipamento;
          $equipamento->ultima_manutencao    = $request->ultima_manutencao;
          $equipamento->descricao            = $request->descricao;
          $equipamento->tipo_equipamentos_id = $request->tipo_equipamentos_id;
          $equipamento->ambientes_id         = $request->ambientes_id;
          $equipamento->status               = $request->status;

        }else{
          $equipamento->numero_equipamento   = $request->numero_equipamento;
          $equipamento->ultima_manutencao    = $request->ultima_manutencao;
          $equipamento->descricao            = $request->descricao;
          $equipamento->tipo_equipamentos_id = $request->tipo_equipamentos_id;
          $equipamento->ambientes_id         = $request->ambientes_id;
          $equipamento->status               = $request->status;
        }
        $this->validate($request, $this->equipamento->rules, $this->equipamento->msg);
        $insert = $equipamento->save();
        if($insert){
            return redirect('/equipamentos');
        }else{
            return redirect()->back();
        }
    }



    public function show($id){
    }



    public function edit($id, Ambiente $ambiente, TipoEquipamento $tipoEquipamento){
      $equipamento       = $this->equipamento->find($id);
      $ambientes         = $ambiente->all();
      $tipoEquipamentos  = $tipoEquipamento->all();
      return view('dashboard.equipamento.edit', compact('equipamento','ambientes', 'tipoEquipamentos'));
    }



    public function update(Request $request, $id){
        if($request->hasFile('file')){
          $file = $request->file('file');
          $nomeImagem = date('Y-m-d-H:i:s').'-'.$file->getClientOriginalName();
          $path = 'imgs/equipamentos/';
          $file->move($path, $nomeImagem);

          $equipamentoImg = array(
            'imagem'               => $path.$nomeImagem,
            'numero_equipamento'   => $request->numero_equipamento,
            'ultima_manutencao'    => $request->ultima_manutencao,
            'descricao'            => $request->descricao,
            'tipo_equipamentos_id' => $request->tipo_equipamentos_id,
            'ambientes_id'         => $request->ambientes_id,
            'status'               => $request->status,
          );

        }else{
          $equipamentoImg = $request->all();
        }
          $equipamento = $this->equipamento->find($id);

          $this->validate($request, $this->equipamento->rules, $this->equipamento->msg);
          $update = $equipamento->update($equipamentoImg);

          if($update){
            return redirect('/equipamentos');
          }else{
            return redirect()->back();
          }
    }



    public function destroy($id){
        $equipamento = $this->equipamento->find($id);
        $delete      = $equipamento->delete();

        if($delete){
          return redirect()->route('equipamentos.index');
        }else{
          return redirect()->route('equipamentos.edit', $id)->with(['errors' => 'Falha ao deletar']);
        }
    }
}
