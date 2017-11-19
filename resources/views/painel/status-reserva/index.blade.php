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
  <h2>Status das Reservas</h2>
  <p>Esta seção corresponde aos status das reservas disponíveis para cadastro</p>
</div>
<h3 class="title-secao-h3">Lista de status das reservas disponíveis no sistema:</h3>
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
            @foreach($status as $stat)
              <tr>
                <td>{{$stat->nome}}</td>
                <td>{{$stat->descricao}}</td>
                <td class="btn-acoes">
                  <a class="btn btn-primary" href="{{route('status-reservas.edit', $stat->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
                  {!! Form::open(['route' => ['status-reservas.destroy', $stat->id], 'method' => 'DELETE']) !!}
                    <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                  {!! Form::close() !!}
                </td>
              </tr>
            @endforeach
        </tbody>
    </table>
</div>
  <a class="btn btn-success btn-cadastrar" href="{{route('status-reservas.create')}}">
    <span class="glyphicon glyphicon-plus"></span> Cadastrar novo status
  </a>
@endsection
