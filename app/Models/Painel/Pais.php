<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;
use App\Models\Painel\Estado;

class Pais extends Model{
    protected $fillable = ['nome'];
    // protected $guarded = [];

    public $rules = [
        'nome' => 'required|unique:pais,nome,id|min:4|max:50',
    ];

    public $msg = [
        'nome.required' => 'O campo nome precisa ser preenchido!',
        'nome.unique' => 'Este nome já está cadastrado no sistema!',
        'nome.min' => 'O campo nome deve ter no mínimo 4 caracteres.',
        'nome.max' => 'O campo nome deve ter no máximo 50 caracteres.',
    ];

    public function estados(){
        return $this->hasMany(Estado::class);
    }
}
