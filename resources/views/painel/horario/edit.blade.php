@extends('layout.config')

@section('secao-config')
  <h3 class="title-secao-h3">Formulário para alterar status de reserva:</h3>
  <div class="form-config">
    <form class="form" method="post" action="{{route('horarios.update', $horarios->id)}}">
      <fieldset>
        <legend class="legend">Alterar Horário {{$horarios->horas}}:{{$horarios->minutos}}</legend>
        @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
          @endforeach
        </div>
        @endif
        {!! method_field('PUT') !!}
        {!! csrf_field() !!}
        <div class="form-horario">
          <div class="form-group">
              <label for="horas">Horas</label>
              <input name="horas" type="number" maxlength="2" class="form-control" placeholder="00" required value="{{$horarios->horas}}">
          </div>
          <p>:</p>
          <div class="form-group">
              <label for="minutos">Minutos</label>
              <input name="minutos" type="number" maxlength="2" class="form-control" placeholder="00" required value="{{$horarios->minutos}}">
          </div>
        </div>
        <div class="btns-cadastro">
            <a class="btn btn-warning btn-form" href="/configuracoes/horarios" type="submit">Voltar</a>
            <button class="btn btn-success btn-form" type="submit">Editar</button>
        </div>
      </fieldset>
    </form>
@endsection
