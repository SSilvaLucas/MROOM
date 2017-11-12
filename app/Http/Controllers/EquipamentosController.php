<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request;
use App\Equipamento;

class EquipamentosController extends Controller{
    public function index(){
      $equipamentos = Equipamento::all();
      return view('equipamentos.listaEquipamentos', array('equipamentos'=>$equipamentos));
    }
}
