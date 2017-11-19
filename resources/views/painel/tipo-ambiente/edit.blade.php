@extends('layout.config')

@section('secao-config')
  <h3 class="title-secao-h3">Formulário para alterar tipo de ambiente:</h3>
  <div class="form-config">
    <form class="form" method="post" action="{{route('tipos-ambientes.update', $tipo->id)}}">
      <fieldset>
        <legend class="legend">Alterar Tipo {{$tipo->nome}}</legend>
        @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
          @endforeach
        </div>
        @endif
        {!! method_field('PUT') !!}
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="nome">Nome do tipo de ambiente: </label>
            <input name="nome" type="text" maxlength="30" class="form-control" placeholder="Nome do tipo" required value="{{$tipo->nome}}">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição sobre o tipo de ambiente: </label>
            <textarea placeholder="Máximo de 200 Caracteres." name="descricao" class="form-control" maxlength="200" rows="4" cols="50" required>{{$tipo->descricao}}</textarea>
        </div>
        <div class="btns-cadastro">
            <a class="btn btn-warning btn-form" href="/configuracoes/tipos-ambientes" type="submit">Voltar</a>
            <button class="btn btn-success btn-form" type="submit">Editar</button>
        </div>
      </fieldset>
    </form>
@endsection
