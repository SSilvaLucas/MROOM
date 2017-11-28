<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Cidade;
use App\Models\Painel\Estado;

class CidadeController extends Controller{

    private $cidade;

    public function __construct(Cidade $cidade){
        $this->cidade = $cidade;
    }



    public function index(Cidade $cidade){
        $cidades = $cidade->all();

        return view('painel.cidade.index', compact('cidades'));
    }



    public function create(Cidade $cidade, Estado $estado){
        $cidades = $cidade->all();
        $estados = $estado->all();
        return view('painel.cidade.create', compact('cidades','estados'));
    }



    public function store(Request $request){
        $dataForm = $request->all();

        $this->validate($request, $this->cidade->rules, $this->cidade->msg);
        $insert = $this->cidade->create($dataForm);

        if($insert){
            return redirect('/configuracoes/cidades');
        }else{
            return redirect()->back();
        }
    }



    public function show($id){
    }



    public function edit($id, Estado $estado){
        $cidade = $this->cidade->find($id);
        $estados  = $estado->all();
        return view('painel.cidade.edit', compact('cidade', 'estados'));
    }



    public function update(Request $request, $id){
        $dataForm = $request->all();
        $cidade = $this->cidade->find($id);

        $this->validate($request, $this->cidade->rules, $this->cidade->msg);
        $update = $cidade->update($dataForm);

        if($update){
          return redirect('/configuracoes/cidades');
        }else{
          return redirect()->back();
        }
    }



    public function destroy($id){
        $cidade = $this->cidade->find($id);

        $delete = $cidade->delete();

        if($delete){
          return redirect()->route('cidades.index');
        }else{
          return redirect()->route('cidades.edit', $id)->with(['errors' => 'Falha ao deletar']);
        }
    }
}
