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
  <h2>Estados</h2>
  <p>Esta seção corresponde aos estados disponíveis para cadastro</p>
</div>
<h3 class="title-secao-h3">Lista dos estados disponíveis no sistema:</h3>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Sigla</th>
                <th>País</th>
                <th class="coluna-acoes">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estados as $estado)
              <tr>
                <td>{{$estado->nome}}</td>
                <td>{{$estado->sigla}}</td>
                <td>{{$estado->pais->nome}}</td>
                <td class="btn-acoes">
                  <a class="btn btn-primary" href="{{route('estados.edit', $estado->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
                  {!! Form::open(['route' => ['estados.destroy', $estado->id], 'method' => 'DELETE']) !!}
                    <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                  {!! Form::close() !!}
                </td>
              </tr>
            @endforeach
        </tbody>
    </table>
</div>
  <a class="btn btn-success btn-cadastrar" href="{{route('estados.create')}}">
    <span class="glyphicon glyphicon-plus"></span> Cadastrar novo estado
  </a>
@endsection
