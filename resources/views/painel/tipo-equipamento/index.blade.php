@extends('layout.config')

@section('secao-config')
<h3 class="title-secao-h3">Lista de Tipos de Equipamentos disponíveis no sistema:</h3>

@if(isset($errors) && count($errors) > 0)
<div class="alert alert-danger">
  @foreach ($errors->all() as $error)
    <p>{{$error}}</p>
  @endforeach
</div>
@endif

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th class="coluna-acoes">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tipos as $tipo)
              <tr>
                <td>{{$tipo->nome}}</td>
                <td>{{$tipo->descricao}}</td>
                <td class="btn-acoes">
                  <a class="btn btn-primary" href="{{route('tipos-equipamentos.edit', $tipo->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
                  {!! Form::open(['route' => ['tipos-equipamentos.destroy', $tipo->id], 'method' => 'DELETE']) !!}
                    <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                  {!! Form::close() !!}
                </td>
              </tr>
            @endforeach
        </tbody>
    </table>
</div>
  <a class="btn btn-success btn-cadastrar" href="{{url("/configuracoes/tipos-equipamentos/create")}}">
    <span class="glyphicon glyphicon-plus"></span> Cadastrar novo tipo
  </a>
@endsection
