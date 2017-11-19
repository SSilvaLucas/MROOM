@extends('layout.app')

@section('title','Configurações')

@push('css')
  {{Html::style('css/style-config.css')}}
@endpush

@section('conteudo')
  <div class="container">
    <h1 class="title-secao-h1"><span class="glyphicon glyphicon-cog"></span> Configurações de Cadastro</h1>
    <ul class="nav nav-tabs">
      <li role="presentation" class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          Funcionários <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
          <li><a href="#">Setores</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="#">DDD Telefones</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="#">Cidades</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="#">Estados</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="#">Países</a></li>
        </ul>
      </li>
      <li role="presentation" class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          Reservas <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
          <li><a href="#">Horários</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="#">Status de Reserva</a></li>
        </ul>
      </li>
      <li role="presentation" class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          Equipamentos <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
          <li><a href="{{route('tipos-equipamentos.index')}}">Tipos de Equipamentos</a></li>
        </ul>
      </li>
      <li role="presentation" class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          Ambientes <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
          <li><a href="#">Tipos de Ambientes</a></li>
        </ul>
      </li>
    </ul>
    <div class="title-secao-h2">
      <h2>Tipos de Equipamentos</h2>
      <p>Esta seção corresponde aos tipos de equipamentos disponíveis para cadastro</p>
    </div>
    @yield('secao-config')
  </div>
@endsection
