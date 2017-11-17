@extends('layout.config')

@section('secao-config')
  <h3 class="title-secao-h3">Formulário para cadastrar novo tipo de equipamento:</h3>
  <div class="form-config">
    <form class="form" method="post" action="{{url("/configuracoes/tipos-equipamentos/store")}}">
      <fieldset>
        <legend class="legend">Novo Tipo de Equipamento</legend>
        @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
          @endforeach
        </div>
        @endif
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="nome">Nome do tipo de equipamento: </label>
            <input name="nome" type="text" class="form-control" placeholder="Nome do tipo" required value="{{old('nome')}}">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição sobre o tipo de equipamento: </label>
            <textarea placeholder="Máximo de 200 Caracteres." name="descricao" class="form-control" maxlength="200" rows="4" cols="50" required value="{{old('descricao')}}"></textarea>
        </div>
        <div class="btns-cadastro">
            <a class="btn btn-warning btn-form" href="/configuracoes/tipos-equipamentos" type="submit">Voltar</a>
            <button class="btn btn-success btn-form" type="submit">Cadastrar</button>
        </div>
      </fieldset>
    </form>
@endsection
