@extends('layout.config')

@section('secao-config')
  <h3 class="title-secao-h3">Formulário para cadastrar novo setor:</h3>
  <div class="form-config">
    <form class="form" method="post" action="{{route('setores.store')}}">
      <fieldset>
        <legend class="legend">Novo Setor</legend>
        @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
          @endforeach
        </div>
        @endif
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="nome">Nome do setor: </label>
            <input name="nome" type="text" maxlength="50" class="form-control" placeholder="Nome do setor" required value="{{old('nome')}}">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição sobre o setor: </label>
            <textarea placeholder="Máximo de 200 Caracteres." name="descricao" class="form-control" maxlength="200" rows="4" cols="50" required value="{{old('descricao')}}"></textarea>
        </div>
        <div class="btns-cadastro">
            <a class="btn btn-warning btn-form" href="/configuracoes/setores" type="submit">Voltar</a>
            <button class="btn btn-success btn-form" type="submit">Cadastrar</button>
        </div>
      </fieldset>
    </form>
@endsection
