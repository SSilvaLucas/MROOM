@extends('layout.app')

@section('title', 'Adicionar Equipamento')

@section('conteudo')
<div class="container">
  <h1>Adicionar novo equipamento</h1>
  <!-- {{Form::open(['action'=>'EquipamentosController@store'])}} -->
  <!-- <form action="http://localhost:8000/equipamentos" method="POST" accept-charset="UTF-8"> -->
  <!-- <div class="form-group"> -->
      <!-- <label for="numero">Número do Equipamento: </label> -->
      <!-- <input name="numero" type="number" class="form-control" placeholder="Número do Equipamento" required> -->
      <!-- {{Form::label('numero', 'Número do Equipamento')}}
      {{Form::number('numero','',['class'=>'form-control','required','placeholder'=>'Número do Equipamento'])}} -->
      <!-- <label for="ultimaManutencao">Data da Última Manutenção: </label> -->
      <!-- <input name="ultimaManutencao" type="date" class="form-control" placeholder="{{\Carbon\Carbon::now()}}"> -->
      <!-- {{Form::label('ultima-manutencao', 'Data da Última Manutenção')}}
      {{Form::date('ultima-manutencao', \Carbon\Carbon::now())}} -->
      <!-- {{Form::label('imagem', '')}}
      {{Form::file()}} -->
      <!-- <label for="descricao">Descrição: </label> -->
      <!-- <input name="descricao" type="text" class="form-control" placeholder="Descreva informações adicionais ou observações sobre o equipamento"> -->
      <!-- {{Form::label('descricao', 'Descrição')}}
      {{Form::text('descricao', '', ['class'=>'form-control', 'placeholder'=>'Descreva informações ou observações sobre o equipamento'])}} -->
      <!-- {{Form::label('tipo', '')}}
      {{Form::select()}}
      {{Form::label('ambiente', '')}}
      {{Form::select()}} -->
      <!-- <button type="submit" class="btn btn-success">Cadastrar</button> -->
      <!-- {{Form::submit('Cadastrar', ['class'=>'btn btn-success'])}} -->
    <!-- </div> -->
  <!-- </form> -->
  <!-- {{Form::close()}} -->
</div>
@endsection
