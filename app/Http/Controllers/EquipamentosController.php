<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Request;

class EquipamentosController extends Controller{
    public function index(){
      return view('listaEquipamentos');
    }
}
