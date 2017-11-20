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
  <h2>DDDs de Regiões</h2>
  <p>Esta seção corresponde aos ddds disponíveis para cadastro</p>
</div>
<h3 class="title-secao-h3">Lista dos ddds disponíveis no sistema:</h3>
<div class="table-responsive">
    <table class="table table-bordered table-horario">
        <thead>
            <tr>
                <th>DDD</th>
                <th class="coluna-acoes">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ddds as $ddd)
              <tr>
                <td>{{$ddd->ddd}}</td>
                <td class="btn-acoes">
                  <a class="btn btn-primary" href="{{route('ddds.edit', $ddd->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
                  {!! Form::open(['route' => ['ddds.destroy', $ddd->id], 'method' => 'DELETE']) !!}
                    <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                  {!! Form::close() !!}
                </td>
              </tr>
            @endforeach
        </tbody>
    </table>
</div>
  <a class="btn btn-success btn-cadastrar" href="{{route('ddds.create')}}">
    <span class="glyphicon glyphicon-plus"></span> Cadastrar novo DDD
  </a>
@endsection
