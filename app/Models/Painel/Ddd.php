<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Ddd extends Model{
    protected $fillable = ['id','ddd'];
    // protected $guarded = [];

    public $rules = [
        'ddd'=> 'required|unique:ddds,ddd,id|min:1|max:3',
    ];

    public $msg = [
        'nome.unique' => 'Este nome já está cadastrado no sistema!',
        'ddd.required' => 'O campo DDD precisa ser preenchido!',
        'ddd.min' => 'DDD inválido!',
        'ddd.max' => 'DDD inválido!',
    ];
}
