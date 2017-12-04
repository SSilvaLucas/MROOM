<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;
use App\Models\Painel\TipoAmbiente;

class Setore extends Model{
    protected $fillable = ['nome', 'descricao'];
    // protected $guarded = [];

    public $rules = [
        'nome'      => 'required|unique:setores,nome,id|min:4|max:50',
        'descricao' => 'required|min:5|max:200',
    ];

    public $msg = [
        'nome.required' => 'O campo nome precisa ser preenchido!',
        'nome.unique' => 'Este nome já está cadastrado no sistema!',
        'nome.min' => 'O campo nome deve ter no mínimo 4 caracteres.',
        'nome.max' => 'O campo nome deve ter no máximo 50 caracteres.',
        'descricao.required' => 'O campo descrição precisa ser preenchido!',
        'descricao.min' => 'O campo descrição deve ter no mínimo 5 caracteres.',
        'descricao.max' => 'O campo descrição deve ter no máximo 200 caracteres.',
    ];

    public function tiposAmbiente(){
        return $this->hasMany(TipoAmbiente::class);
    }
}
