@extends('layout.config')

@section('secao-config')

@if(isset($errors) && count($errors) > 0)
<div class="alert alert-danger">
  @foreach ($errors->all() as $error)
    <p>{{$error}}</p>
  @endforeach
</div>
@endif

<div class="title-secao-h2">
  <h2>Cidades</h2>
  <p>Esta seção corresponde as cidades disponíveis para cadastro</p>
</div>
<h3 class="title-secao-h3">Lista dos cidades disponíveis no sistema:</h3>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Estado</th>
                <th>País</th>
                <th class="coluna-acoes">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cidades as $cidade)
              <tr>
                <td>{{$cidade->nome}}</td>
                <td>{{$cidade->estado->nome}}</td>
                <td>{{$cidade->estado->pais->nome}}</td>
                <td class="btn-acoes">
                  <a class="btn btn-primary" href="{{route('cidades.edit', $cidade->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
                  {!! Form::open(['route' => ['cidades.destroy', $cidade->id], 'method' => 'DELETE']) !!}
                    <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                  {!! Form::close() !!}
                </td>
              </tr>
            @endforeach
        </tbody>
    </table>
</div>
  <a class="btn btn-success btn-cadastrar" href="{{route('cidades.create')}}">
    <span class="glyphicon glyphicon-plus"></span> Cadastrar nova cidades
  </a>
@endsection
