@extends('layout.config')

@section('secao-config')
  <h3 class="title-secao-h3">Formulário para alterar cidade:</h3>
  <div class="form-config">
    <form class="form" method="post" action="{{route('cidades.update', $cidade->id)}}">
      <fieldset>
        <legend class="legend">Alterar cidade {{$cidade->nome}}</legend>
        @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
          @endforeach
        </div>
        @endif
        {!! method_field('PUT') !!}
        {!! csrf_field() !!}
          <div class="form-group form-select">
            <label for="nome">Nome da cidade: </label>
            <input name="nome" type="text" maxlength="100" class="form-control" placeholder="Nome da cidade" required value="{{$cidade->nome}}">
          </div>
        <div class="form-group form-select">
          <label for="estado_id">Estado: </label>
          <select name="estado_id" class="form-control" required>
            @foreach($estados as $estado)
              @if($cidade->estado_id == $estado->id)
                <option selected value="{{$estado->id}}">{{$estado->nome}}</option>
              @else
                <option value="{{$estado->id}}">{{$estado->nome}}</option>
              @endif
            @endforeach
          </select>
        </div>
        <div class="btns-cadastro">
            <a class="btn btn-warning btn-form" href="/configuracoes/cidades" type="submit">Voltar</a>
            <button class="btn btn-success btn-form" type="submit">Editar</button>
        </div>
      </fieldset>
    </form>
@endsection
