@extends('layout.app')

@section('title','Cadastro de Ambientes')

@push('css')
  {{Html::style('css/dashboard.css')}}
@endpush

@push('scripts')
  {{Html::script('js/busca-ambiente.js')}}
@endpush

@section('conteudo')
  <div class="container secao-dashboard">
      <h1 class="title-secao-h1"><span class="glyphicon glyphicon-map-marker"></span> Ambientes</h1>
      <h3 class="title-secao-h3">Formulário para cadastrar novo ambiente:</h3>
      <div class="form-config">
        <form class="form" method="post" action="{{route('ambientes.store')}}" enctype="multipart/form-data">
          <fieldset>
            <legend class="legend">Novo Ambiente</legend>
            @if(isset($errors) && count($errors) > 0)
            <div class="alert alert-danger">
              @foreach ($errors->all() as $error)
                <p>{{$error}}</p>
              @endforeach
            </div>
            @endif
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="nome">Nome do ambiente: </label>
                <input name="nome" type="text" maxlength="30" class="form-control" placeholder="Nome do ambiente" required value="{{old('nome')}}">
            </div>
            <div class="form-2-linha-control">
              <div class="form-group form-max">
                  <label for="file">Imagem: </label>
                  <input id="file" name="file" type="file" class="form-control">
              </div>
              <div class="form-2-caracter form-group">
                  <label for="capacidade">Capacidade: </label>
                  <input id="capacidade" name="capacidade" type="number" maxlength="30" class="form-control" placeholder="Capacidade" required value="{{old('capacidade')}}">
              </div>
            </div>
            <div class="form-2-linha-control">
              <div class="form-group form-metade">
                  <label for="tipo_ambientes_id">Tipo do Ambiente: </label>
                  <select id="tipo_ambientes_id" name="tipo_ambientes_id" class="form-control" required>
                    <option disabled selected> - Selecione - </option>
                    @foreach($tiposAmbiente as $tipoAmbiente)
                      <option value="{{$tipoAmbiente->id}}">{{$tipoAmbiente->nome}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="form-group form-metade">
                  <label for="setores_id">Setor Pertencente: </label>
                  <select id="setores_id" name="setores_id" class="form-control" required>
                    <option disabled selected> - Selecione - </option>
                    @foreach($setores as $setor)
                      <option value="{{$setor->id}}">{{$setor->nome}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição sobre o ambiente: </label>
                <textarea placeholder="Máximo de 200 Caracteres." name="descricao" class="form-control" maxlength="200" rows="4" cols="50" required value="{{old('descricao')}}"></textarea>
            </div>
            <div class="btns-cadastro">
                <a class="btn btn-warning btn-form" href="/ambientes" type="submit">Voltar</a>
                <button class="btn btn-success btn-form" type="submit">Cadastrar</button>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
@endsection
