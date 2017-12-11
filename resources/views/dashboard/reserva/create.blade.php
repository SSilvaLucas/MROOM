@extends('layout.app')

@section('title','Solicitar Reserva')

@push('css')
  {{Html::style('css/dashboard.css')}}
@endpush

@push('scripts')
  {{Html::script('js/busca-ambiente.js')}}
@endpush

@section('conteudo')
  <div class="container secao-dashboard">
      <h1 class="title-secao-h1"><span class="glyphicon glyphicon-calendar"></span> Reservas</h1>
      <h3 class="title-secao-h3">Formulário para solicitar reserva:</h3>
      <div class="form-config">
        <form class="form" method="post" action="{{url('reservas/solicita')}}" enctype="multipart/form-data">
          <fieldset>
            <legend class="legend">Nova Solicitação</legend>
            @if(isset($errors) && count($errors) > 0)
            <div class="alert alert-danger">
              @foreach ($errors->all() as $error)
                <p>{{$error}}</p>
              @endforeach
            </div>
            @endif
            {!! csrf_field() !!}
            <div class="form-group">
              <div class="form-2-linha-control">
                <div class="form-metade form-group">
                  <label for="data_inicio">Data de Início: </label>
                  <input id="data_inicio" name="data_inicio" type="date" class="form-control" placeholder="dd/mm/aa" required value="{{old('data_inicio')}}">
                </div>
                <div class="form-metade form-group">
                  <label for="data_fim">Data de Fim: </label>
                  <input id="data_fim" name="data_fim" type="date" class="form-control" placeholder="dd/mm/aa" required value="{{old('data_fim')}}">
                </div>
              </div>
              <label for="ambiente_id">Ambiente: </label>
              <select id="ambiente_id" name="ambiente_id" class="form-control" required>
                <option disabled selected> - Selecione - </option>
                @foreach($ambientes as $ambiente)
                  <option value="{{$ambiente->id}}">{{$ambiente->nome}}</option>
                @endforeach
              </select>
            </div>
            <div class="btns-cadastro">
                <a class="btn btn-warning btn-form" href="/reservas" type="submit">Voltar</a>
                <button class="btn btn-primary btn-form" type="submit">Verificar</button>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
@endsection
