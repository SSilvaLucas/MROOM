@extends('layout.app')

@section('title','Registrar')

@section('conteudo')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="janela-login panel panel-default">
                <div class="panel-heading">Registrar</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{route('register')}}">
                      <fieldset>
                        @if(isset($errors) && count($errors) > 0)
                          <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                              <p>{{$error}}</p>
                            @endforeach
                          </div>
                        @endif
                        {{ csrf_field() }}
                        <div class="linha-form">
                          <div class="form-group col-md-6">
                            <label for="nome">Nome: </label>
                            <input id="nome" name="nome" type="text" maxlength="20" class="form-control" placeholder="Seu primeiro nome" required value="{{old('nome')}}">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="sobrenome">Sobrenome: </label>
                            <input id="sobrenome" name="sobrenome" type="text" maxlength="70" class="form-control" placeholder="Seu sobrenome" required value="{{old('sobrenome')}}">
                          </div>
                        </div>

                        <div class="linha-form">
                          <div class="form-group col-md-6">
                            <label for="cpf">CPF: </label>
                            <input id="cpf" name="cpf" type="number" maxlength="11" class="form-control" placeholder="Somente números" required value="{{old('cpf')}}">
                          </div>
                          <div class="form-group col-md-2">
                            <label for="ddds_id">DDD: </label>
                            <input id="ddds_id" name="telefone" type="number" maxlength="10" class="form-control" placeholder="ex: 99999-9999" required value="{{old('telefone')}}">

                          </div>
                          <div class="form-group col-md-4">
                            <label for="telefone">Telefone: </label>
                            <input id="telefone" name="telefone" type="number" maxlength="10" class="form-control" placeholder="ex: 99999-9999" required value="{{old('telefone')}}">
                          </div>
                        </div>

                        <div class="linha-form">
                          <div class="form-group col-md-6">
                            <label for="setor">Setor Pertencente: </label>
                            <input id="setor" name="setor" type="text" maxlength="20" class="form-control" placeholder="Seu primeiro nome" required value="{{old('nome')}}">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="cidades_id">Cidade: </label>
                            <input id="cidades_id" name="cidades_id" type="text" maxlength="70" class="form-control" placeholder="Seu sobrenome" required value="{{old('sobrenome')}}">
                          </div>
                        </div>

                        <div class="linha-form">
                          <div class="form-group col-md-12">
                            <label for="email">Email: </label>
                            <input id="email" name="email" type="email" maxlength="100" class="form-control" placeholder="ex: seuemail@email.com.br" required value="{{old('email')}}">
                          </div>
                        </div>

                        <div class="linha-form">
                          <div class="form-group col-md-6">
                            <label for="senha">Senha: </label>
                            <input id="senha" name="password" type="password" maxlength="20" class="form-control"  required>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="confirma-senha">Confirmar Senha: </label>
                            <input id="confirma-senha" name="password_confirmation" type="password" maxlength="70" class="form-control" required>
                          </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-10">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
