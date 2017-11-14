@extends('layout.app')

@section('title','Equipamentos')

@section('conteudo')
<div class="container table-responsive">
  <table id="tabela-dados" class="table table-hover">
      <thead class="thead-inverse">
          <tr>
              <th>Número do Equipamento</th>
              <th>Tipo do Equipamento</th>
              <th>Ambiente Pertencente</th>
              <th></th>
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
              <td class="item-lista">
                <button class="btn btn-primary btn-lista" type="button" data-toggle="collapse" data-target="#collapse{{$equipamento->idEquipamento}}" aria-expanded="false" aria-controls="collapse{{$equipamento->idEquipamento}}">
                    Visualizar
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
                </div>
            </td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
@endsection
