<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;
use App\Models\Painel\Estado;

class Cidade extends Model{
  protected $fillable = ['nome', 'estado_id'];
  // protected $guarded = [];

  public $rules = [
      'nome'      => 'required|unique:estados,nome|min:4|max:100',
      'estado_id'   => 'required',
  ];

  public $msg = [
      'nome.required'      => 'O campo nome precisa ser preenchido!',
      'nome.unique'        => 'Este nome de estado já está cadastrado no sistema!',
      'nome.min'           => 'O campo nome deve ter no mínimo 4 caracteres.',
      'nome.max'           => 'O campo nome deve ter no máximo 100 caracteres.',
      'estado_id.required' => 'O campo País deve ser selecionado',
  ];

  public function estado(){
      return $this->belongsTo(Estado::class);
  }
}
