@extends('layout.config')

@section('secao-config')
  <h3 class="title-secao-h3">Formulário para alterar país:</h3>
  <div class="form-config">
    <form class="form" method="post" action="{{route('paises.update', $pais->id)}}">
      <fieldset>
        <legend class="legend">Alterar país {{$pais->nome}}</legend>
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
            <label for="nome">Nome do país: </label>
            <input name="nome" type="text" maxlength="50" class="form-control" placeholder="Nome do país" required value="{{$pais->nome}}">
        </div>
        <div class="btns-cadastro">
            <a class="btn btn-warning btn-form" href="/configuracoes/paises" type="submit">Voltar</a>
            <button class="btn btn-success btn-form" type="submit">Editar</button>
        </div>
      </fieldset>
    </form>
@endsection
