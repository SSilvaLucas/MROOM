@extends('layout.app')

@section('title','Ambientes')

@push('css')
  {{Html::style('css/dashboard.css')}}
@endpush

@push('scripts')
  {{Html::script('js/busca-ambiente.js')}}
@endpush

@section('conteudo')
  <div class="container secao-dashboard">
      <h1 class="title-secao-h1"><span class="glyphicon glyphicon-map-marker"></span> Ambientes</h1>
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
                      <th>Nome do Ambiente</th>
                      <th>Tipo do Ambiente</th>
                      <th>Capacidade</th>
                      <th class="btn-coluna"></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($ambientes as $ambiente)
                    <tr class="iten">
                        <td class="item-lista info-nome">{{$ambiente->nome}}</td>
                        <td class="">{{$ambiente->tipoAmbiente['nome']}}</td>
                        <td>{{$ambiente->capacidade}}</td>
                        <td class="item-lista btn-coluna">
                          <button class="btn btn-default btn-lista" type="button" data-toggle="collapse" data-target="#{{$ambiente->id}}" aria-expanded="false" aria-controls="{{$ambiente->id}}">
                              <span class="glyphicon glyphicon-eye-open"></span>
                          </button>
                        </td>
                    </tr>
                    <tr class="collapse" id="{{$ambiente->id}}">
                      <td class="detalhes-lista" colspan="5">
                          <div class="well">
                            <h3 class="titulo-collapse">Ambiente: {{$ambiente->nome}}</h3>
                            <div class="corpo-collapse">
                              <img class="img-collapse" src="{{$ambiente->imagem}}">
                              <ul class="info-collapse">
                                <li>Setor Pertencente: {{$ambiente->setor['nome']}}</li>
                                <li>Descrição: {{$ambiente->descricao}}</li>
                              </ul>
                            </div>
                            <div class="btn-acoes">
                              <a class="btn btn-primary" href="{{route('ambientes.edit', $ambiente->id)}}"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
                              {!! Form::open(['route' => ['ambientes.destroy', $ambiente->id], 'method' => 'DELETE']) !!}
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
      <a class="btn btn-success btn-cadastrar" href="{{route('ambientes.create')}}">
        <span class="glyphicon glyphicon-plus"></span> Cadastrar novo Ambiente
      </a>
    </div>

@endsection
