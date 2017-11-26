<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model{
    protected $fillable = ['id', 'horario'];
    // protected $guarded = [];

    public $rules = [
        'horario' => 'required|unique:horarios,horario,id|min:5|max:5',
    ];

    public $msg = [
        'horario.required' => 'O campo de horas precisa ser preenchido!',
        'horario.unique' => 'Este horário já está cadastrado no sistema!',
        'horario.min' => 'Hora inválida!',
        'horario.max' => 'Hora inválida!',
    ];
}
