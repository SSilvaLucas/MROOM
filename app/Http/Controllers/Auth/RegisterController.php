<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Painel\Ddd;

class RegisterController extends Controller{

    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct(){
        $this->middleware('guest');
    }

    protected function validator(array $data){
        return Validator::make($data, [
            'nome'       => 'required|string|min:2|max:20',
            'sobrenome'  => 'required|string|min:2|max:70',
            'email'      => 'required|string|email|max:100|unique:users',
            'password'   => 'required|string|min:6|confirmed',
            'telefone'   => 'required|string|min:7|max:10',
            'cpf'        => 'required|string|min:11|max:11|unique:users',
            'ddds_id'    => 'required',
            'setores_id' => 'required',
            'cidades_id' => 'required',
        ]);
    }

    protected function create(array $data, Ddd $ddd){
        $ddds = $ddd->all();
        return view('auth.register', compact('ddds'));
    }

    protected function store(array $data){
      return User::create([
          'nome'       => $data['nome'],
          'sobrenome'  => $data['sobrenome'],
          'email'      => $data['email'],
          'password'   => bcrypt($data['password']),
          'telefone'   => $data['telefone'],
          'cpf'        => $data['cpf'],
          'ddds_id'    => $data['ddds_id'],
          'setores_id' => $data['setores_id'],
          'cidades_id' => $data['cidades_id'],
      ]);
    }
}
