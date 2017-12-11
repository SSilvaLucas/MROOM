<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dashboard\Reserva;
use App\Models\Painel\Horario;
use App\Models\Dashboard\Ambiente;
use Auth;


class ReservaController extends Controller{

    private $reserva;

    public function __construct(Reserva $reserva){
        $this->reserva = $reserva;
    }


    public function index(){
        $reservas = Reserva::orderBy('data_inicio')->get();
        return view('dashboard.reserva.index', compact('reservas'));
    }


    public function create(Reserva $reserva, Horario $horario, Ambiente $ambiente){
        $reservas = $reserva->all();
        $ambientes = $ambiente->all();
        return view('dashboard.reserva.create', compact('reservas', 'horarios', 'ambientes'));
    }


    public function solicita(Request $request, Horario $horario, Ambiente $ambientes){
        $horarios     = $horario->all();
        $ambiente     = $ambientes->find($request->ambiente_id);
        $verificaForm = $request->all();

        $reservas = Reserva::whereDate('data_fim', '>=', $request->data_inicio)
                              ->where('ambiente_id', '=', $request->ambiente_id)
                              ->get();

        return view('dashboard.reserva.solicita', compact('reservas', 'horarios', 'ambiente', 'verificaForm'));
    }


    public function store(Request $request, Reserva $reserva){

    }


    public function edit($id, Reserva $reserva){
        $reserva = $this->reserva->find($id);
        $horarios = $horario->all();
        $ambientes = $ambiente->all();
        return view('dashboard.reserva.edit', compact('reserva', 'horarios', 'ambientes'));
    }

    public function update(Request $request, $id){

    }

    public function destroy($id){
        $reserva = $this->reserva->find($id);
        $delete  = $reserva->delete();

        if($delete){
          return redirect()->route('reservas.index');
        }else{
          return redirect()->route('reservas.edit', $id)->with(['errors' => 'Falha ao deletar']);
        }
    }
}
