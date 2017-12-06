@extends('layout.app')

@section('title','Manutenções')

@push('css')
  {{Html::style('css/dashboard.css')}}
@endpush

@push('scripts')
  {{Html::script('js/busca-ambiente.js')}}
  {{Html::script('js/status-manutencao.js')}}
@endpush

@section('conteudo')
  <div class="container secao-dashboard">
      <h1 class="title-secao-h1"><span class="glyphicon glyphicon-wrench"></span> Manutenções</h1>
      <form class="navbar-form navbar-left" role="search">
          <div class="secao-filtro">
            <div class="input-filtro">
              <span class="icon-filtro glyphicon glyphicon-filter"></span>
              <input name="filtro" id="busca-iten" type="text" class="input-filtro form-control" placeholder="Buscar">
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
                      <th>Número da Manutenção</th>
                      <th>Equipamento</th>
                      <th>Data da Solicitação</th>
                      <th>Status</th>
                      <th class="btn-coluna"></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($manutencoes as $manutencao)
                    <tr class="iten">
                        <td class="item-lista info-nome">{{$manutencao->id}}</td>
                        <td class="">{{$manutencao->equipamento->numero_equipamento}}</td>
                        <td>{{$manutencao->data_solicitacao}}</td>
                        <td class="status">{{$manutencao->status}}</td>
                        <td class="item-lista btn-coluna">
                          <button class="btn btn-default btn-lista" type="button" data-toggle="collapse" data-target="#{{$manutencao->id}}" aria-expanded="false" aria-controls="{{$manutencao->id}}">
                              <span class="glyphicon glyphicon-eye-open"></span>
                          </button>
                        </td>
                    </tr>
                    <tr class="collapse" id="{{$manutencao->id}}">
                      <td class="detalhes-lista" colspan="5">
                          <div class="well">
                            <h3 class="titulo-collapse">Manutenção: {{$manutencao->id}}</h3>
                            <div class="corpo-collapse">
                              <ul class="info-collapse">
                                <li>Descrição do Problema: {{$manutencao->descricao_problema}}</li>
                                <li>Solicitante: {{$manutencao->user->nome}}</li>
                                <li>Descrição da Conclusão: {{$manutencao->descricao_conclusao}}</li>
                                <li>Data da Conclusão: {{$manutencao->data_conclusao}}</li>
                              </ul>
                            </div>
                            <div class="btn-acoes">
                              <a class="btn btn-primary" href="{{route('manutencoes.edit', $manutencao->id)}}"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
                              {!! Form::open(['route' => ['manutencoes.destroy', $manutencao->id], 'method' => 'DELETE']) !!}
                                <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span> Excluir</button>
                              {!! Form::close() !!}
                            </div>
                          </div>
                      </td>
                    </tr>
                  @endforeach
              </tbody>
        </table>
      </div>
      <a class="btn btn-success btn-cadastrar" href="{{route('manutencoes.create')}}">
        <span class="glyphicon glyphicon-plus"></span> Solicitar manutenção
      </a>
    </div>

@endsection
