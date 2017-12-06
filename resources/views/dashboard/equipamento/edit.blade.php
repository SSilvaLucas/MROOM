@extends('layout.app')

@section('title','Editar Equipamento')

@push('css')
  {{Html::style('css/dashboard.css')}}
@endpush

@section('conteudo')
<div class="container secao-dashboard">
    <h1 class="title-secao-h1"><span class="glyphicon glyphicon-map-marker"></span> Equipamentos</h1>
    <h3 class="title-secao-h3">Formulário para editar equipamento:</h3>
    <div class="form-config">
      <form class="form" method="post" action="{{route('equipamentos.update', $equipamento->id)}}" enctype="multipart/form-data">
        <legend class="legend">Editar Equipamento</legend>
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
            <label for="numero_equipamento">Número do Equipamento: </label>
            <input name="numero_equipamento" type="text" maxlength="30" class="form-control" placeholder="Número do equipamento" required value="{{$equipamento->numero_equipamento}}">
        </div>
        <div class="form-group">
            <label for="file">Imagem: </label>
            <input id="file" name="file" type="file" class="form-control">
        </div>
        <div class="form-2-linha-control">
          <div class="form-metade form-group">
              <label for="ultima_manutencao">Última Manutenção: </label>
              <input id="ultima_manutencao" name="ultima_manutencao" type="date" class="form-control" placeholder="dd/mm/aa" required value="{{$equipamento->ultima_manutencao}}">
          </div>
          <div class="form-group form-metade">
            <label for="status">Status do Equipamento: </label>
            <select id="status" name="status" class="form-control" required>
              <option value="disponível" selected>Disponível</option>
              <option value="solicitada">Solicitada</option>
              <option value="indisponível">Indisponével</option>
            </select>
          </div>
        </div>
        <div class="form-2-linha-control">
          <div class="form-group form-metade">
              <label for="tipo_equipamentos_id">Tipo do Equipamento: </label>
              <select id="tipo_equipamentos_id" name="tipo_equipamentos_id" class="form-control" required>
                <option disabled selected> - Selecione - </option>
                @foreach($tipoEquipamentos as $tipoEquipamento)
                  <option value="{{$tipoEquipamento->id}}">{{$tipoEquipamento->nome}}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group form-metade">
              <label for="ambientes_id">Ambiente Pertencente: </label>
              <select id="ambientes_id" name="ambientes_id" class="form-control" required>
                <option disabled selected> - Selecione - </option>
                @foreach($ambientes as $ambiente)
                  <option value="{{$ambiente->id}}">{{$ambiente->nome}}</option>
                @endforeach
              </select>
          </div>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição sobre o equipamento: </label>
            <textarea placeholder="Máximo de 200 Caracteres." name="descricao" class="form-control" maxlength="200" rows="4" cols="50" required >{{$equipamento->descricao}}</textarea>
        </div>
        <div class="btns-cadastro">
            <a class="btn btn-warning btn-form" href="/equipamentos" type="submit">Voltar</a>
            <button class="btn btn-success btn-form" type="submit">Editar</button>
        </div>
      </form>
    </div>
  </div>
@endsection
