<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class TipoEquipamento extends Model{
    protected $fillable = ['id', 'nome', 'descricao'];
    // protected $guarded = [];

    public $rules = [
        'nome'      => 'required|unique:tipo_equipamentos,nome,id|min:4|max:30',
        'descricao' => 'required|min:5|max:200',
    ];

    public $msg = [
        'nome.required' => 'O campo nome precisa ser preenchido!',
        'nome.unique' => 'Este nome já está cadastrado no sistema!',
        'nome.min' => 'O campo nome deve ter no mínimo 4 caracteres.',
        'nome.max' => 'O campo nome deve ter no máximo 30 caracteres.',
        'descricao.required' => 'O campo descrição precisa ser preenchido!',
        'descricao.min' => 'O campo descrição deve ter no mínimo 5 caracteres.',
        'descricao.max' => 'O campo descrição deve ter no máximo 200 caracteres.',
    ];
}
