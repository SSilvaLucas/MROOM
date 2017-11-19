@extends('layout.config')

@section('secao-config')
  <h3 class="title-secao-h3">Formulário para cadastrar novo horário de reserva:</h3>
  <div class="form-config">
    <form class="form" method="post" action="{{route('horarios.store')}}">
      <fieldset>
        <legend class="legend">Novo Horário de Reserva</legend>
        @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
          @endforeach
        </div>
        @endif
        {!! csrf_field() !!}
        <div class="form-horario">
          <div class="form-group">
              <label for="horas">Horas</label>
              <input name="horas" type="number" maxlength="2" class="form-control" placeholder="00" required value="{{old('horas')}}">
          </div>
          <p>:</p>
          <div class="form-group">
              <label for="minutos">Minutos</label>
              <input name="minutos" type="number" maxlength="2" class="form-control" placeholder="00" required value="{{old('minutos')}}">
          </div>
        </div>
        <div class="btns-cadastro">
            <a class="btn btn-warning btn-form" href="/configuracoes/horarios" type="submit">Voltar</a>
            <button class="btn btn-success btn-form" type="submit">Cadastrar</button>
        </div>
      </fieldset>
    </form>
@endsection
