<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\StatusReserva;

class StatusReservaController extends Controller{

    private $statusReserva;

    public function __construct(StatusReserva $statusReserva){
        $this->statusReserva = $statusReserva;
    }

    public function index(StatusReserva $stat){
        $status = $stat->all();
        return view('painel.status-reserva.index', compact('status'));
    }



    public function create(StatusReserva $stat){
        $status = $stat->all();
        return view('painel.status-reserva.create', compact('status'));
    }



    public function store(Request $request){
        $dataForm = $request->all();

        if(!isset($dataForm['descricao']) || $dataForm['descricao'] == ''){
            $dataForm['descricao'] = 'Não há descrição';
        }

        $this->validate($request, $this->statusReserva->rules, $this->statusReserva->msg);
        $insert = $this->statusReserva->create($dataForm);

        if($insert){
            return redirect('/configuracoes/status-reservas');
        }else{
            return redirect()->back();
        }
    }



    public function show($id){

    }



    public function edit($id){
        $status = $this->statusReserva->find($id);
        return view('painel.status-reserva.edit', compact('status'));
    }



    public function update(Request $request, $id){
        $dataForm = $request->all();
        $status = $this->statusReserva->find($id);

        if(!isset($dataForm['descricao']) || $dataForm['descricao'] == ''){
            $dataForm['descricao'] = 'Não há descrição';
        }
        $this->validate($request, $this->statusReserva->rules, $this->statusReserva->msg);
        $update = $status->update($dataForm);

        if($update){
          return redirect('/configuracoes/status-reservas');
        }else{
          return redirect()->back();
        }
    }



    public function destroy($id){
        $status = $this->statusReserva->find($id);

        $delete = $status->delete();

        if($delete){
          return redirect()->route('status-reservas.index');
        }else{
          return redirect()->route('status-reservas.edit', $id)->with(['errors' => 'Falha ao deletar']);
        }
    }
}
