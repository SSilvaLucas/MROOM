@extends('layout.config')

@section('secao-config')
  <h3 class="title-secao-h3">Formulário para alterar DDD:</h3>
  <div class="form-config">
    <form class="form" method="post" action="{{route('ddds.update', $ddd->id)}}">
      <fieldset>
        <legend class="legend">Alterar DDD {{$ddd->ddd}}</legend>
        @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
          @endforeach
        </div>
        @endif
        {!! method_field('PUT') !!}
        {!! csrf_field() !!}
        <div class="form-group form-ddd">
            <label for="ddd">DDD</label>
            <input name="ddd" type="number" maxlength="3" class="form-control" placeholder="ddd" required value="{{$ddd->ddd}}">
        </div>
        <div class="btns-cadastro">
            <a class="btn btn-warning btn-form" href="/configuracoes/ddds" type="submit">Voltar</a>
            <button class="btn btn-success btn-form" type="submit">Editar</button>
        </div>
      </fieldset>
    </form>
@endsection
