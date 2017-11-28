<?php

namespace App\Http\Controllers\Painel;

use App\Models\Painel\Estado;
use App\Models\Painel\Pais;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EstadoController extends Controller{

    private $estado;

    public function __construct(Estado $estado){
        $this->estado = $estado;
    }


    public function index(Estado $estado){
        $estados = $estado->all();

        return view('painel.estado.index', compact('estados'));
    }


    public function create(Estado $estado, Pais $pais){
        $estados = $estado->all();
        $paises  = $pais->all();
        return view('painel.estado.create', compact('estados', 'paises'));
    }


    public function store(Request $request){
        $dataForm = $request->all();

        $this->validate($request, $this->estado->rules, $this->estado->msg);
        $insert = $this->estado->create($dataForm);

        if($insert){
            return redirect('/configuracoes/estados');
        }else{
            return redirect()->back();
        }
    }


    public function show(Estado $estado){

    }

    public function edit($id, Pais $pais){
        $estado = $this->estado->find($id);
        $paises  = $pais->all();
        return view('painel.estado.edit', compact('estado', 'paises'));
    }

    public function update(Request $request, $id){
        $dataForm = $request->all();
        $estado = $this->estado->find($id);

        $this->validate($request, $this->estado->rules, $this->estado->msg);
        $update = $estado->update($dataForm);

        if($update){
          return redirect('/configuracoes/estados');
        }else{
          return redirect()->back();
        }
    }

    public function destroy($id){
        $estado = $this->estado->find($id);

        $delete = $estado->delete();

        if($delete){
          return redirect()->route('estados.index');
        }else{
          return redirect()->route('estados.edit', $id)->with(['errors' => 'Falha ao deletar']);
        }
    }
}
