@extends('layout.app')

@section('title','Solicitar Manutenção')

@push('css')
  {{Html::style('css/dashboard.css')}}
@endpush

@push('scripts')
  {{Html::script('js/busca-ambiente.js')}}
@endpush

@section('conteudo')
  <div class="container secao-dashboard">
      <h1 class="title-secao-h1"><span class="glyphicon glyphicon-wrench"></span> Manutenções</h1>
      <h3 class="title-secao-h3">Formulário para solicitar manutenção:</h3>
      <div class="form-config">
        <form class="form" method="post" action="{{route('manutencoes.store')}}" enctype="multipart/form-data">
          <fieldset>
            <legend class="legend">Nova Solicitação</legend>
            @if(isset($errors) && count($errors) > 0)
            <div class="alert alert-danger">
              @foreach ($errors->all() as $error)
                <p>{{$error}}</p>
              @endforeach
            </div>
            @endif
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="equipamento_id">Número do Equipamento: </label>
                <select id="equipamento_id" name="equipamento_id" class="form-control" required>
                  <option disabled selected> - Selecione - </option>
                  @foreach($equipamentos as $equipamento)
                    <option value="{{$equipamento->id}}">{{$equipamento->numero_equipamento}} - {{$equipamento->tipoEquipamento->nome}}</option>
                  @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="descricao_problema">Descrição do problema do equipamento: </label>
                <textarea id="descricao_problema" placeholder="Máximo de 200 Caracteres." name="descricao_problema" class="form-control" maxlength="200" rows="4" cols="50" required value="{{old('descricao_problema')}}"></textarea>
            </div>
            <div class="btns-cadastro">
                <a class="btn btn-warning btn-form" href="/manutencoes" type="submit">Voltar</a>
                <button class="btn btn-success btn-form" type="submit">Solicitar</button>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
@endsection
