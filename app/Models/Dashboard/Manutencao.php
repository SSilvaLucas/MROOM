<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;
use App\Models\Dashboard\Equipamento;
use App\User;

class Manutencao extends Model{
    protected $fillable = ['data_solicitacao', 'data_conclusao', 'descricao_problema', 'descricao_conclusao', 'status', 'equipamento_id', 'user_id'];
    // protected $guarded = [];

    public $rules = [
        'descricao_problema'  => 'required|min:4|max:200',
        'descricao_conclusao' => 'min:4|max:200',
    ];

    public $msg = [
        'numero_equipamento.required'=> 'O número do equipamento precisa ser preenchido!',
        'numero_equipamento.unique'  => 'Este número de equipamento já está cadastrado no sistema!',
        'imagem.max'                 => 'Imagem muito grande',
        'descricao.required'         => 'O campo descrição deve ser preenchido.',
        'descricao.min'              => 'O campo descrição deve ter no mínimo 4 caracteres',
        'descricao.max'              => 'O campo descrição deve ter no máximo 200 caracteres',

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function equipamento(){
        return $this->belongsTo(Equipamento::class);
    }
}
