<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Equipamento;

class EquipamentosController extends Controller{
    public function index(){
      $equipamentos = Equipamento::all();
      return view('equipamentos.listaEquipamentos', array('equipamentos'=>$equipamentos));
    }

    public function create(){
      return view('equipamentos.create');
    }

    public function store(Request $request){
      $equipamento = new Equipamento();
      $equipamento->numeroEquipamento = $request->input('numero');
      $equipamento->ultimaManutencao = $request->input('ultimaManutencao');
      // $equipamento->imagemEquipamento = $request->input('imagem');
      $equipamento->descricao = $request->input('descricao');
      $equipamento->manutencoesConcluidas = 2;
      if($equipamento->save()){
        return redirect('equipamentos');
      }
    }
}
