@extends('layout.config')

@section('secao-config')
  <a class="btn btn-success btn-cadastrar" href="{{url("/configuracoes/tipos-equipamentos/create")}}">
    <span class="glyphicon glyphicon-plus"></span> Cadastrar novo tipo
  </a>
@endsection
