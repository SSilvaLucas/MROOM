@extends('layout.config')

@section('secao-config')
  <h3 class="title-secao-h3">Formulário para cadastrar novo DDD:</h3>
  <div class="form-config">
    <form class="form" method="post" action="{{route('ddds.store')}}">
      <fieldset>
        <legend class="legend">Novo DDD</legend>
        @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
          @endforeach
        </div>
        @endif
        {!! csrf_field() !!}
          <div class="form-group form-ddd">
              <label for="ddd">DDD</label>
              <input name="ddd" type="number" maxlength="3" class="form-control" placeholder="ddd" required value="{{old('ddd')}}">
          </div>
        <div class="btns-cadastro">
            <a class="btn btn-warning btn-form" href="/configuracoes/ddds" type="submit">Voltar</a>
            <button class="btn btn-success btn-form" type="submit">Cadastrar</button>
        </div>
      </fieldset>
    </form>
@endsection
