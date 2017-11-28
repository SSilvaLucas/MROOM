<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;
use App\Models\Painel\Pais;

class Estado extends Model{
  protected $fillable = ['nome', 'sigla', 'pais_id'];
  // protected $guarded = [];

  public $rules = [
      'nome'      => 'required|unique:estados,nome,id|min:4|max:100',
      'sigla'     => 'required|unique:estados,sigla|min:2|max:3',
      'pais_id'   => 'required',
  ];

  public $msg = [
      'nome.required'    => 'O campo nome precisa ser preenchido!',
      'nome.unique'      => 'Este nome de estado já está cadastrado no sistema!',
      'nome.min'         => 'O campo nome deve ter no mínimo 4 caracteres.',
      'nome.max'         => 'O campo nome deve ter no máximo 100 caracteres.',
      'sigla.required'   => 'O campo sigla precisa ser preenchido!',
      'sigla.unique'     => 'Esta sigla já está cadastrado no sistema!',
      'sigla.min'        => 'O campo sigla deve ter no mínimo 2 caracteres.',
      'sigla.max'        => 'O campo descrição deve ter no máximo 3 caracteres.',
      'pais_id.required' => 'O campo País deve ser selecionado',
  ];

  public function pais(){
      return $this->belongsTo(Pais::class);
  }
}
