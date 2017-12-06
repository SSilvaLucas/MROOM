@extends('layout.config')

@section('secao-config')
  <h3 class="title-secao-h3">Formulário para cadastrar nova cidade:</h3>
  <div class="form-config">
    <form class="form" method="post" action="{{route('cidades.store')}}">
      <fieldset>
        <legend class="legend">Nova Cidade</legend>
        @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
          @endforeach
        </div>
        @endif
        {!! csrf_field() !!}
          <div class="form-group form-select">
              <label for="nome">Nome da Cidade: </label>
              <input name="nome" type="text" maxlength="100" class="form-control" placeholder="Nome da cidade" required value="{{old('nome')}}">
          </div>
          <div class="form-group form-select">
            <label for="estado_id">Estado: </label>
            <select name="estado_id" class="form-control" required>
              <option disabled selected> - Selecione - </option>
              @foreach($estados as $estado)
                <option value="{{$estado->id}}">{{$estado->nome}}</option>
              @endforeach
            </select>
          </div>
        <div class="btns-cadastro">
            <a class="btn btn-warning btn-form" href="/configuracoes/cidades" type="submit">Voltar</a>
            <button class="btn btn-success btn-form" type="submit">Cadastrar</button>
        </div>
      </fieldset>
    </form>
@endsection
