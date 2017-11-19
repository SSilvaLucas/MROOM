<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model{
    protected $fillable = ['id', 'horas', 'minutos'];
    // protected $guarded = [];

    public $rules = [
        'horas'      => 'required|min:1|max:3',
        'minutos' => 'required|min:1|max:3',
    ];

    public $msg = [
        'horas.required' => 'O campo de horas precisa ser preenchido!',
        'horas.min' => 'Hora inválida!',
        'horas.max' => 'Hora inválida!',
        'minutos.required' => 'O campo de minutos precisa ser preenchido!',
        'minutos.min' => 'Minutos inválidos!',
        'minutos.max' => 'Minutos inválidos!',
    ];
}
