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

        $erro = 0;

        if($request->data_inicio > $request->data_fim){
          $erro = $erro + 1;
        }
        else if($request->data_inicio < date('Y-m-d') || $request->data_fim < date('Y-m-d')){
          $erro = $erro + 1;
        }

        if($erro == 0){
          $reservas = Reserva::whereDate('data_fim', '>=', $request->data_inicio)
                                ->where('ambiente_id', '=', $request->ambiente_id)
                                ->get();

          return view('dashboard.reserva.solicita', compact('reservas', 'horarios', 'ambiente', 'verificaForm'));
        }else{
          return redirect()->route('reservas.create')->with(['errors' => 'Data inválida']);
        }

    }


    public function store(Request $request, Reserva $reserva, Horario $horario){
        $reservas = Reserva::whereDate('data_fim', '>=', $request->data_inicio)
                              ->where('ambiente_id', '=', $request->ambiente_id)
                              ->get();
        $inicio = $horario->find($request->horario_inicio_id);
        $fim    = $horario->find($request->horario_fim_id);
        $erro = 0;
        if($request->data_inicio == $request->data_fim && $inicio->horario >= $fim->horario){
          $erro = $erro + 1;
        }
        else if($request->data_inicio == $request->data_fim && $inicio->horario == $fim->horario){
          $erro = $erro + 1;
        }

        foreach($reservas as $reservat){
          if($reservat->data_inicio == $reservat->data_fim){
            if($inicio->horario < $reservat->horarioFim->horario && $inicio->horario >= $reservat->horarioInicio->horario){
              $erro = $erro + 1;
            }
            else if($inicio->horario < $reservat->horarioInicio->horario && $fim->horario > $reservat->horarioInicio->horario){
              $erro = $erro + 1;
            }
          }else{
             if($request->data_inicio == $reservat->data_fim && $inicio->horario < $reservat->horarioFim->horario){
               $erro = $erro + 1;
             }
             if($request->data_inicio < $reservat->data_fim && $request->data_inicio >= $reservat->data_inicio){
               $erro = $erro + 1;
             }
          }
        }
        if($erro == 0){
          $reserva->data_solicitacao  = date('Y-m-d');
          $reserva->data_inicio       = $request->data_inicio;
          $reserva->data_fim          = $request->data_fim;
          $reserva->descricao         = $request->descricao;
          $reserva->ambiente_id       = $request->ambiente_id;
          $reserva->user_id           = Auth::user()->id;
          $reserva->horario_inicio_id = $request->horario_inicio_id;
          $reserva->horario_fim_id    = $request->horario_fim_id;

          $insert = $reserva->save();

          if($insert){
              return redirect('/reservas');
          }else{
              return redirect()->back();
          }
        }else{
          return redirect()->route('reservas.create')->with(['errors' => 'O Horário escolhido é inválido ou não está disponível']);
        }

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


    public function confirmar(Request $request){
      $reserva = Reserva::find($request->id);
      $reserva -> fill(['status' => 'confirmada']);
      $reserva->save();

        return redirect('/reservas');
    }

    public function recusar(Request $request){
      $reserva = Reserva::find($request->id);
      $reserva -> fill(['status' => 'recusada']);
      $reserva->save();

        return redirect('/reservas');
    }
}
