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
  <h2>Países</h2>
  <p>Esta seção corresponde aos países disponíveis para cadastro</p>
</div>
<h3 class="title-secao-h3">Lista dos países disponíveis no sistema:</h3>
<div class="table-responsive">
    <table class="table table-bordered table-horario">
        <thead>
            <tr>
                <th>Nome</th>
                <th class="coluna-acoes">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paises as $pais)
              <tr>
                <td>{{$pais->nome}}</td>
                <td class="btn-acoes">
                  <a class="btn btn-primary" href="{{route('paises.edit', $pais->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
                  {!! Form::open(['route' => ['paises.destroy', $pais->id], 'method' => 'DELETE']) !!}
                    <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                  {!! Form::close() !!}
                </td>
              </tr>
            @endforeach
        </tbody>
    </table>
</div>
  <a class="btn btn-success btn-cadastrar" href="{{route('paises.create')}}">
    <span class="glyphicon glyphicon-plus"></span> Cadastrar novo país
  </a>
@endsection
