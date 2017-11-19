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



    public function create(){

    }



    public function store(Request $request){

    }



    public function show($id){

    }



    public function edit($id){

    }



    public function update(Request $request, $id){

    }



    public function destroy($id){

    }
}
