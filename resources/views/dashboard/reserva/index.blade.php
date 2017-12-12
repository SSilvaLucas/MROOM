@extends('layout.app')

@section('title','Reservas')

@push('css')
  {{Html::style('css/dashboard.css')}}
@endpush

@push('scripts')
  {{Html::script('js/busca-ambiente.js')}}
  {{Html::script('js/status-manutencao.js')}}
@endpush

@section('conteudo')
  <div class="container secao-dashboard">
      <h1 class="title-secao-h1"><span class="glyphicon glyphicon-calendar"></span> Reservas</h1>
      <form class="navbar-form navbar-left" role="search">
          <div class="secao-filtro">
            <div class="input-filtro">
              <span class="icon-filtro glyphicon glyphicon-filter"></span>
              <input name="filtro" id="busca-iten" type="text" class="input-filtro form-control" placeholder="Buscar por data">
            </div>
            <!-- <div class="radio-filtro">
              <label class="campo-formulario">
                  <input id="filtro-nome" type="radio" name="usado" value="true"> Nome
              </label>
              <label class="campo-formulario">
                  <input id="filtro-tipo" type="radio" name="usado" value="true"> Tipo
              </label>
              <label class="campo-formulario">
                  <input id="filtro-capacidade" type="radio" name="usado" value="true"> Capacidade
              </label>
            </div> -->
        </div>
      </form>
      <div class="table-responsive">
        <table class="table table-hover table-responsive">
              <thead>
                  <tr>
                      <th>Número da reserva</th>
                      <th>Data de Início</th>
                      <th>Data de Fim</th>
                      <th>Horário de Início</th>
                      <th>Horário de Fim</th>
                      <th>Ambiente</th>
                      <th>Status</th>
                      <th class="btn-coluna"></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($reservas as $reserva)
                    <tr class="iten">
                        <td>{{$reserva->id}}</td>
                        <td class="item-lista info-nome">{{date('d/m/y', strtotime($reserva->data_inicio))}}</td>
                        <td>{{date('d/m/y', strtotime($reserva->data_fim))}}</td>
                        <td class="">{{$reserva->horarioInicio->horario}}</td>
                        <td class="">{{$reserva->horarioFim->horario}}</td>
                        <td class="">{{$reserva->ambiente->nome}}</td>
                        <td class="status">{{$reserva->status}}</td>
                        <td class="item-lista btn-coluna">
                          <button class="btn btn-default btn-lista" type="button" data-toggle="collapse" data-target="#{{$reserva->id}}" aria-expanded="false" aria-controls="{{$reserva->id}}">
                              <span class="glyphicon glyphicon-eye-open"></span>
                          </button>
                        </td>
                    </tr>
                    <tr class="collapse" id="{{$reserva->id}}">
                      <td class="detalhes-lista" colspan="8">
                          <div class="well">
                            <h3 class="titulo-collapse">Reserva: {{$reserva->id}}</h3>
                            <div class="corpo-collapse">
                              <ul class="info-collapse">
                                <li>Descrição: {{$reserva->descricao}}</li>
                                <li>Solicitante: {{$reserva->user->nome}} {{$reserva->user->sobrenome}}</li>
                                <li>Data da solicitação: {{date('d / m / Y', strtotime($reserva->data_solicitacao))}}</li>
                              </ul>
                            </div>
                            <div class="btn-adm">
                              <div class="btn-acoes">
                                {!! Form::open(['url' => '/reservas/confirmar', 'method' => 'POST']) !!}
                                <input type="hidden" name="id" value="{{$reserva->id}}"></input>
                                <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> Confirmar</button>
                                {!! Form::close() !!}
                                {!! Form::open(['url' => '/reservas/recusar', 'method' => 'POST']) !!}
                                <input type="hidden" name="id" value="{{$reserva->id}}"></input>
                                <button style="margin-left: 1em" class="btn btn-warning" type="submit"><span class="glyphicon glyphicon-remove"></span> Recusar</button>
                                {!! Form::close() !!}
                              </div>
                              <div class="btn-acoes">
                                <a class="btn btn-primary" href="{{route('reservas.edit', $reserva->id)}}"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
                                {!! Form::open(['route' => ['reservas.destroy', $reserva->id], 'method' => 'DELETE']) !!}
                                  <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span> Excluir</button>
                                {!! Form::close() !!}
                              </div>
                            </div>
                          </div>
                      </td>
                    </tr>
                  @endforeach
              </tbody>
        </table>
      </div>
      <a class="btn btn-success btn-cadastrar" href="{{route('reservas.create')}}">
        <span class="glyphicon glyphicon-plus"></span> Solicitar reserva
      </a>
    </div>

@endsection
