<?php

namespace App\Http\Controllers\Painel;

use App\Painel\Estado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Estado;

class EstadoController extends Controller{

    private $estado;

    public function __construct(Estado $estado){
        $this->estado = $estado;
    }


    public function index(Estado $estado){
        $estados = $estado->all();
        return view('painel.estados.index', compact('estados'));
    }


    public function create(Estado $estado){
        $estados = $estado->all();
        return view('painel.estado.create', compact('estados'));
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

    public function edit(Estado $estado){
        $estado = $this->estado->find($id);
        return view('painel.estado.edit', compact('estado'));
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

    public function destroy(Estado $estado){
        $estado = $this->estado->find($id);

        $delete = $estado->delete();

        if($delete){
          return redirect()->route('estados.index');
        }else{
          return redirect()->route('estados.edit', $id)->with(['errors' => 'Falha ao deletar']);
        }
    }
}
