<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Pais;

class PaisController extends Controller{
    private $pais;

    public function __construct(Pais $pais){
        $this->pais = $pais;
    }



    public function index(Pais $pais){
        $paises = $pais->all();
        return view('painel.pais.index', compact('paises'));
    }



    public function create(Pais $pais){
        $paises = $pais->all();
        return view('painel.pais.create', compact('paises'));
    }



    public function store(Request $request){
        $dataForm = $request->all();

        $this->validate($request, $this->pais->rules, $this->pais->msg);
        $insert = $this->pais->create($dataForm);

        if($insert){
            return redirect('/configuracoes/paises');
        }else{
            return redirect()->back();
        }
    }



    public function show($id){
    }



    public function edit($id){
        $pais = $this->pais->find($id);
        return view('painel.pais.edit', compact('pais'));
    }



    public function update(Request $request, $id){
        $dataForm = $request->all();
        $pais = $this->pais->find($id);

        if(!isset($dataForm['nome']) || $dataForm['nome'] == ''){
            $dataForm['nome'] = 'Nome nulo';
        }
        $this->validate($request, $this->pais->rules, $this->pais->msg);
        $update = $pais->update($dataForm);

        if($update){
          return redirect('/configuracoes/paises');
        }else{
          return redirect()->back();
        }
    }



    public function destroy($id){
        $pais = $this->pais->find($id);

        $delete = $pais->delete();

        if($delete){
          return redirect()->route('paises.index');
        }else{
          return redirect()->route('paises.edit', $id)->with(['errors' => 'Falha ao deletar']);
        }
    }
}
