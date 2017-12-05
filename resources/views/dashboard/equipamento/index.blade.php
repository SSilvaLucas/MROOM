@extends('layout.app')

@section('title','Equipamentos')

@push('css')
  {{Html::style('css/dashboard.css')}}
@endpush

@push('scripts')
  {{Html::script('js/busca-ambiente.js')}}
  {{Html::script('js/status.js')}}
@endpush

@section('conteudo')
  <div class="container secao-dashboard">
      <h1 class="title-secao-h1"><span class="glyphicon glyphicon-facetime-video"></span> Equipamentos</h1>
      <form class="navbar-form navbar-left" role="search">
          <div class="secao-filtro">
            <div class="input-filtro">
              <span class="icon-filtro glyphicon glyphicon-filter"></span>
              <input name="filtro" id="busca-iten" type="text" class="input-filtro form-control" placeholder="Buscar">
            </div>
            <div class="radio-filtro">
              <label class="campo-formulario">
                  <input id="filtro-nome" type="radio" name="usado" value="true"> Nome
              </label>
              <label class="campo-formulario">
                  <input id="filtro-tipo" type="radio" name="usado" value="true"> Tipo
              </label>
              <label class="campo-formulario">
                  <input id="filtro-capacidade" type="radio" name="usado" value="true"> Capacidade
              </label>
            </div>
        </div>
      </form>
      <div class="table-responsive">
        <table class="table table-hover table-responsive">
              <thead>
                  <tr>
                      <th>Número do Equipamento</th>
                      <th>Tipo do Equipamento</th>
                      <th>Ambiente Pertencente</th>
                      <th>Status</th>
                      <th class="btn-coluna"></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($equipamentos as $equipamento)
                    <tr class="iten">
                        <td class="item-lista info-nome">{{$equipamento->numero_equipamento}}</td>
                        <td class="">{{$equipamento->tipoEquipamento->nome}}</td>
                        <td>{{$equipamento->ambiente->nome}}</td>
                        <td class="status">{{$equipamento->status}}</td>
                        <td class="item-lista btn-coluna">
                          <button class="btn btn-default btn-lista" type="button" data-toggle="collapse" data-target="#{{$equipamento->id}}" aria-expanded="false" aria-controls="{{$equipamento->id}}">
                              <span class="glyphicon glyphicon-eye-open"></span>
                          </button>
                        </td>
                    </tr>
                    <tr class="collapse" id="{{$equipamento->id}}">
                      <td class="detalhes-lista" colspan="5">
                          <div class="well">
                            <h3 class="titulo-collapse">Equipamento: {{$equipamento->numero_equipamento}}</h3>
                            <div class="corpo-collapse">
                              <img class="img-collapse" src="{{$equipamento->imagem}}">
                              <ul class="info-collapse">
                                <li>Ambiente Pertencente: {{$equipamento->ambiente->nome}}</li>
                                <li>Data da última manutenção: {{$equipamento->ultima_manutencao}}</li>
                                <li>Descrição: {{$equipamento->descricao}}</li>
                              </ul>
                            </div>
                            <div class="btn-acoes">
                              <a class="btn btn-primary" href="{{route('equipamentos.edit', $equipamento->id)}}"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
                              {!! Form::open(['route' => ['equipamentos.destroy', $equipamento->id], 'method' => 'DELETE']) !!}
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
      <a class="btn btn-success btn-cadastrar-equipamento" href="{{route('equipamentos.create')}}">
        <span class="glyphicon glyphicon-plus"></span> Cadastrar novo Equipamento
      </a>
    </div>

@endsection
