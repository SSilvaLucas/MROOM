@extends('layout.config')

@section('secao-config')
  <h3 class="title-secao-h3">Formulário para alterar estado:</h3>
  <div class="form-config">
    <form class="form" method="post" action="{{route('estados.update', $estado->id)}}">
      <fieldset>
        <legend class="legend">Alterar país {{$estado->nome}}</legend>
        @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
          @endforeach
        </div>
        @endif
        {!! method_field('PUT') !!}
        {!! csrf_field() !!}
        <div class="form-estado">
          <div class="form-group">
            <label for="nome">Nome do estado: </label>
            <input name="nome" type="text" maxlength="100" class="form-control" placeholder="Nome do estado" required value="{{$estado->nome}}">
          </div>
          <div class="form-group form-sigla">
            <label for="sigla">Sigla: </label>
            <input name="sigla" type="text" maxlength="3" class="form-control" placeholder="AA" required value="{{$estado->sigla}}">
          </div>
        </div>
        <div class="form-group form-select">
          <label for="pais_id">País: </label>
          <!-- <input name="pais_id" list="paises"  class="form-control" placeholder="Nome do país" required value="{{old('nome')}}"> -->
          <select name="pais_id" class="form-control" required>
            @foreach($paises as $pais)
              @if($estado->pais_id == $pais->id)
                <option selected value="{{$pais->id}}">{{$pais->nome}}</option>
              @else
                <option value="{{$pais->id}}">{{$pais->nome}}</option>
              @endif
            @endforeach
          </select>
        </div>
        <div class="btns-cadastro">
            <a class="btn btn-warning btn-form" href="/configuracoes/estados" type="submit">Voltar</a>
            <button class="btn btn-success btn-form" type="submit">Editar</button>
        </div>
      </fieldset>
    </form>
@endsection
