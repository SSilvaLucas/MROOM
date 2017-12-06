@extends('layout.app')

@section('title','Editar Manutenção')

@push('css')
  {{Html::style('css/dashboard.css')}}
@endpush

@section('conteudo')
<div class="container secao-dashboard">
    <h1 class="title-secao-h1"><span class="glyphicon glyphicon-wrench"></span> Manutenções</h1>
    <h3 class="title-secao-h3">Formulário para editar solicitações de manutenção:</h3>
    <div class="form-config">
      <form class="form" method="post" action="{{route('manutencoes.update', $manutencao->id)}}" enctype="multipart/form-data">
        <legend class="legend">Novo Equipamento</legend>
        @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
          @endforeach
        </div>
        @endif
        {!! method_field('PUT') !!}
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="equipamento_id">Número do Equipamento: </label>
            <select id="equipamento_id" name="equipamento_id" class="form-control" required>
              <option disabled selected> - Selecione - </option>
              @foreach($equipamentos as $equipamento)
                <option value="{{$equipamento->id}}">{{$equipamento->numero_equipamento}}</option>
              @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="descricao_problema">Descrição do problema do equipamento: </label>
            <textarea id="descricao_problema" placeholder="Máximo de 200 Caracteres." name="descricao_problema" class="form-control" maxlength="200" rows="4" cols="50" required>{{$manutencao->descricao_problema}}</textarea>
        </div>
        <div class="btns-cadastro">
            <a class="btn btn-warning btn-form" href="/manutencoes" type="submit">Voltar</a>
            <button class="btn btn-success btn-form" type="submit">Editar</button>
        </div>
      </form>
    </div>
  </div>
@endsection
