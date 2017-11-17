@extends('layout.app')

@section('title','Equipamentos')

@push('css')
  {{Html::style('css/style-listas.css')}}
@endpush

@section('conteudo')
<div class="container table-responsive">
  <table id="tabela-dados" class="table table-hover">
      <thead>
          <tr>
              <th>Número do Equipamento</th>
              <th>Tipo do Equipamento</th>
              <th>Ambiente Pertencente</th>
              <th class="btn-coluna"></th>
          </tr>
      </thead>
      <tbody>
          @foreach($equipamentos as $equipamento)
            <tr>
                <td class="item-lista"> {{$equipamento->numeroEquipamento}} </td>
                <td></td>
                <td></td>
                <!-- <td class="item-lista"> {{$equipamento->fk_tipoEquipamento}} </td> -->
                <!-- <td class="item-lista"> {{$equipamento->fk_idAmbiente}} </td> -->
                <td class="item-lista btn-coluna">
                  <button class="btn btn-default btn-lista" type="button" data-toggle="collapse" data-target="#collapse{{$equipamento->idEquipamento}}" aria-expanded="false" aria-controls="collapse{{$equipamento->idEquipamento}}">
                      <span class="glyphicon glyphicon-zoom-in"></span>
                  </button>
                </td>
            </tr>
            <tr class="collapse" id="collapse{{$equipamento->idEquipamento}}">
              <td class="detalhes-lista" colspan="4">
                  <div class="well">
                    <h3>Equipamento: {{$equipamento->numeroEquipamento}}</h3>
                    <ul>
                      <!-- <li>Tipo: {{$equipamento->fkTipoEquipamento}}</li> -->
                      <!-- <li>Ambiente vinculado: {{$equipamento->fkAmbiente}}</li> -->
                      <li>Data da última manutenção: {{$equipamento->ultimaManutencao}}</li>
                      <li>Quantidade de manutenções concluídas: {{$equipamento->manutencoesConcluidas}}
                    </ul>
                    <p>{{$equipamento->descricao}}</p>
                    <div class="btn-acoes">
                      <a class="btn btn-primary" href="#"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
                      <a class="btn btn-danger" href="#"><span class="glyphicon glyphicon-trash"></span> Excluir</a>
                    </div>
                  </div>
              </td>
            </tr>
          @endforeach
      </tbody>
  </table>
</div>
<div class="container">
  <a class="btn btn-success btn-formulario" href="#"><span class="glyphicon glyphicon-plus"></span> Cadastrar Novo Equipamento</a>
</div>
@endsection
