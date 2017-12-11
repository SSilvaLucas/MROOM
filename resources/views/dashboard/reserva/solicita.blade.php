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
      <div class="table-responsive reservas-solicitadas">
        <h3 class="title-secao-h3">Horários ocupados em {{$ambiente->nome}} a partir de {{date('d/m/y', strtotime($verificaForm['data_inicio']))}}:</h3>
        <table class="table table-hover table-responsive">
              <thead>
                  <tr>
                      <th>Número da reserva</th>
                      <th>Data</th>
                      <th>Horário de Início</th>
                      <th>Horário de Fim</th>
                      <th>Status</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($reservas as $reserva)
                    @if($reserva->data_inicio == $reserva->data_fim)
                      <tr class="iten">
                          <td>{{$reserva->id}}</td>
                          <td>{{date('d/m/y', strtotime($reserva->data_fim))}}</td>
                          <td class="">{{$reserva->horarioInicio->horario}}</td>
                          <td class="">{{$reserva->horarioFim->horario}}</td>
                          <td class="status">{{$reserva->status}}</td>
                      </tr>
                    @else
                      <tr class="iten">
                          <td>{{$reserva->id}}</td>
                          <td>{{date('d/m/y', strtotime($reserva->data_inicio))}}</td>
                          <td class="">{{$reserva->horarioInicio->horario}}</td>
                          <td class="">23:59:59</td>
                          <td class="status">{{$reserva->status}}</td>
                      </tr>
                      @php
                        $data = date('Y-m-d', strtotime("+1 days", strtotime($reserva->data_inicio)));
                      @endphp
                      @while($data <= $reserva->data_fim)
                        @if($data == $reserva->data_fim)
                          <tr class="iten">
                              <td>{{$reserva->id}}</td>
                              <td>{{date('d/m/y', strtotime($data))}}</td>
                              <td class="">00:00:00</td>
                              <td class="">{{$reserva->horarioFim->horario}}</td>
                              <td class="status">{{$reserva->status}}</td>
                          </tr>
                        @else
                          <tr class="iten">
                              <td>{{$reserva->id}}</td>
                              <td>{{date('d/m/y', strtotime($data))}}</td>
                              <td class="">00:00:00</td>
                              <td class="">23:59:59</td>
                              <td class="status">{{$reserva->status}}</td>
                          </tr>
                        @endif
                        @php
                        $data = date('Y-m-d', strtotime("+1 days", strtotime($data)));
                        @endphp
                      @endwhile
                    @endif
                  @endforeach
              </tbody>
        </table>
      </div>
      <div class="form-config">
        <form class="form" method="post" action="{{route('reservas.store')}}" enctype="multipart/form-data">
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
              <div class="form-group">
                <label for="ambiente_id">Ambiente: </label>
                <select id="ambiente_id" name="ambiente_id" class="form-control" disabled>
                    <option disabled selected value="{{$ambiente->id}}">{{$ambiente->nome}}</option>
                </select>
            </div>
              <div class="form-2-linha-control">
                <div class="form-metade form-group">
                  <label for="data_inicio">Data de Início: </label>
                  <input id="data_inicio" name="data_inicio" type="date" class="form-control" placeholder="dd/mm/aa" required value="{{$verificaForm['data_inicio']}}" disabled>
                </div>
                <div class="form-metade form-group">
                  <label for="data_fim">Data de Fim: </label>
                  <input id="data_fim" name="data_fim" type="date" class="form-control" placeholder="dd/mm/aa" required value="{{$verificaForm['data_fim']}}" disabled>
                </div>
              </div>
              <div class="form-2-linha-control">
                <div class="form-metade form-group">
                  <label for="horario_inicio_id">Horario de Início: </label>
                  <select size="4" id="horario_inicio_id" name="horario_inicio_id" class="form-control" required>
                    <option disabled selected> - Selecione - </option>
                    @foreach($horarios as $horario)
                      <option value="{{$horario->id}}">{{$horario->horario}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-metade form-group">
                  <label for="horario_fim_id">Horario de Fim: </label>
                  <select size="4" id="horario_fim_id" name="horario_fim_id" class="form-control" required>
                    <option disabled selected> - Selecione - </option>
                    @foreach($horarios as $horario)
                      <option value="{{$horario->id}}">{{$horario->horario}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                  <label for="descricao">Descrição da reserva: </label>
                  <textarea id="descricao" placeholder="Máximo de 200 Caracteres." name="descricao" class="form-control" maxlength="200" rows="4" cols="50" required>{{old('descricao')}}</textarea>
              </div>
            </div>
            <div class="btns-cadastro">
                <a class="btn btn-warning btn-form" href="/reservas/create" type="submit">Voltar</a>
                <button class="btn btn-success btn-form" type="submit">Solicitar</button>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
@endsection
