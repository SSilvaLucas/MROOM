<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Painel\Setore;
use App\Models\Painel\TipoAmbiente;
use App\Models\Dashboard\Ambiente;
use Image;

class AmbienteController extends Controller{

    private $ambiente;

    public function __construct(Ambiente $ambiente){
        $this->ambiente = $ambiente;
    }



    public function index(Ambiente $ambiente){
        $ambientes = $ambiente->all();
        return view('dashboard.ambiente.index', compact('ambientes'));
    }



    public function create(Ambiente $ambiente, Setore $setor, TipoAmbiente $tipoAmbiente){
        $ambientes      = $ambiente->all();
        $setores        = $setor->all();
        $tiposAmbiente  = $tipoAmbiente->all();
        return view('dashboard.ambiente.create', compact('ambientes','setores', 'tiposAmbiente'));
    }



    public function store(Request $request, Ambiente $ambiente){
        if($request->hasFile('file')){
          $file = $request->file('file');
          $nomeImagem = date('Y-m-d-H:i:s').'-'.$file->getClientOriginalName();
          $path = 'imgs/ambientes/';
          $file->move($path, $nomeImagem);

          $ambiente->imagem = $path.$nomeImagem;

          $ambiente->nome              = $request->nome;
          $ambiente->capacidade        = $request->capacidade;
          $ambiente->descricao         = $request->descricao;
          $ambiente->tipo_ambientes_id = $request->tipo_ambientes_id;
          $ambiente->setores_id        = $request->setores_id;

        }else{
          $ambiente->nome              = $request->nome;
          $ambiente->capacidade        = $request->capacidade;
          $ambiente->descricao         = $request->descricao;
          $ambiente->tipo_ambientes_id = $request->tipo_ambientes_id;
          $ambiente->setores_id        = $request->setores_id;
        }
        $this->validate($request, $this->ambiente->rules, $this->ambiente->msg);
        $insert = $ambiente->save();
        if($insert){
            return redirect('/ambientes');
        }else{
            return redirect()->back();
        }
    }


    public function show($id){
    }


    public function edit($id, Ambiente $ambienteEd, Setore $setor, TipoAmbiente $tipoAmbiente){
        $ambienteEd       = $this->ambiente->find($id);
        $setores        = $setor->all();
        $tiposAmbiente  = $tipoAmbiente->all();
        return view('dashboard.ambiente.edit', compact('ambienteEd','setores', 'tiposAmbiente'));
    }



    public function update(Request $request, $id){
      if($request->hasFile('file')){
        $file = $request->file('file');
        $nomeImagem = date('Y-m-d-H:i:s').'-'.$file->getClientOriginalName();
        $path = 'imgs/ambientes/';
        $file->move($path, $nomeImagem);

        $ambienteImg = array(
          'imagem'            => $path.$nomeImagem,
          'nome'              => $request->nome,
          'capacidade'        => $request->capacidade,
          'descricao'         => $request->descricao,
          'tipo_ambientes_id' => $request->tipo_ambientes_id,
          'setores_id'        => $request->setores_id,
        );

      }else{
        $ambienteImg = $request->all();
      }
        $ambiente = $this->ambiente->find($id);

        $this->validate($request, $this->ambiente->rules, $this->ambiente->msg);
        $update = $ambiente->update($ambienteImg);

        if($update){
          return redirect('/ambientes');
        }else{
          return redirect()->back();
        }
    }


    public function destroy($id){
        $ambiente = $this->ambiente->find($id);
        $delete   = $ambiente->delete();

        if($delete){
          return redirect()->route('ambientes.index');
        }else{
          return redirect()->route('ambientes.edit', $id)->with(['errors' => 'Falha ao deletar']);
        }
    }
}
