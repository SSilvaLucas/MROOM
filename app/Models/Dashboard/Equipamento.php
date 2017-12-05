<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;
use App\Models\Painel\TipoEquipamento;
use App\Models\Dashboard\Ambiente;

class Equipamento extends Model{
  protected $fillable = ['numero_equipamento', 'ultima_manutencao', 'imagem', 'descricao', 'tipo_equipamentos_id', 'ambientes_id', 'status'];
  // protected $guarded = [];

  public $rules = [
      'numero_equipamento'  => 'required|integer|unique:equipamentos,numero_equipamento',
      'ultima_manutencao'   => 'required',
      'imagem'              => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      'descricao'           => 'required|min:4|max:200',
      'tipo_equipamentos_id'=> 'required',
      'ambientes_id'        => 'required',
      'status'              => 'required',
  ];

  public $msg = [
      'numero_equipamento.required'=> 'O número do equipamento precisa ser preenchido!',
      'numero_equipamento.unique'  => 'Este número de equipamento já está cadastrado no sistema!',
      'capacidade.required'        => 'O campo capacidade deve ser preenchido!',
      'imagem.max'                 => 'Imagem muito grande',
      'descricao.required'         => 'O campo descrição deve ser preenchido.',
      'descricao.min'              => 'O campo descrição deve ter no mínimo 4 caracteres',
      'descricao.max'              => 'O campo descrição deve ter no máximo 200 caracteres',
      'tipo_equipamentos_id.required' => 'O Tipo do Ambiente deve ser selecionado',
      'ambientes_id.required'      => 'O Ambiente em que o equipamento está vinculado deve ser selecionado',
  ];

  public function tipoEquipamento(){
      return $this->belongsTo(TipoEquipamento::class, 'tipo_equipamentos_id');
  }

  public function ambiente(){
      return $this->belongsTo(Ambiente::class, 'ambientes_id');
  }
}
