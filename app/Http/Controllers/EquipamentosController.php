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
}
