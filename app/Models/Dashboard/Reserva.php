<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;
use App\Models\Painel\Horario;
use App\Models\Dashboard\Ambiente;
use App\User;

class Reserva extends Model{
  protected $fillable = ['data_solicitacao', 'data_inicio', 'data_fim', 'descricao', 'status', 'horario_inicio_id', 'horario_fim_id', 'user_id', 'ambiente_id'];
  // protected $guarded = [];

  public $rules = [
  ];

  public $msg = [
      // 'numero_equipamento.required'=> 'O número do equipamento precisa ser preenchido!',
  ];

  public function user(){
      return $this->belongsTo(User::class);
  }

  public function ambiente(){
      return $this->belongsTo(Ambiente::class, 'ambiente_id');
  }

  public function horarioInicio(){
      return $this->belongsTo(Horario::class, 'horario_inicio_id');
  }

  public function horarioFim(){
      return $this->belongsTo(Horario::class, 'horario_fim_id');
  }
}
