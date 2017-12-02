<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{
    use Notifiable;

    protected $fillable = [
        'nome', 'sobrenome', 'email', 'password', 'telefone', 'cpf', 'ddds_id', 'setores_id', 'cidades_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
