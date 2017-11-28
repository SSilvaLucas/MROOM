@extends('layout.config')

@section('secao-config')
  <h3 class="title-secao-h3">Formulário para cadastrar novo estado:</h3>
  <div class="form-config">
    <form class="form" method="post" action="{{route('estados.store')}}">
      <fieldset>
        <legend class="legend">Novo Estado</legend>
        @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
          @endforeach
        </div>
        @endif
        {!! csrf_field() !!}
        <div class="form-estado">
          <div class="form-group">
              <label for="nome">Nome do Estado: </label>
              <input name="nome" type="text" maxlength="100" class="form-control" placeholder="Nome do estado" required value="{{old('nome')}}">
          </div>
          <div class="form-group form-sigla">
              <label for="sigla">Sigla: </label>
              <input name="sigla" type="text" maxlength="3" class="form-control" placeholder="AA" required value="{{old('sigla')}}">
          </div>
        </div>
      <div class="form-group form-select">
        <label for="pais_id">País: </label>
        <!-- <input name="pais_id" list="paises"  class="form-control" placeholder="Nome do país" required value="{{old('nome')}}"> -->
        <select name="pais_id" class="form-control" required>
          <option disabled selected> - Selecione - </option>
          @foreach($paises as $pais)
            <option value="{{$pais->id}}">{{$pais->nome}}</option>
          @endforeach
        </select>
      </div>
        <div class="btns-cadastro">
            <a class="btn btn-warning btn-form" href="/configuracoes/estados" type="submit">Voltar</a>
            <button class="btn btn-success btn-form" type="submit">Cadastrar</button>
        </div>
      </fieldset>
    </form>
@endsection
