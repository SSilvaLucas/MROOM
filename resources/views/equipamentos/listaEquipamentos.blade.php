@extends('layout.app')

@section('title','Equipamentos')

@section('conteudo')
<div class="container container-fluid">
  <table id="tabela-dados" class="table table-striped">
      <thead class="thead-inverse">
          <tr>
              <th>Número do Equipamento</th>
              <th>Data da Última Manutenção</th>
              <th>Tipo do Equipamento</th>
              <th>Ambiente Pertencente</th>
          </tr>
      </thead>
      <tbody>
          @foreach($equipamentos as $equipamento)
          <tr>
              <td> {{$equipamento->numeroEquipamento}} </td>
              <td> {{$equipamento->ultimaManutencao}} </td>
              <!-- <td> {{$equipamento->fk_tipoEquipamento}} </td> -->
              <!-- <td> {{$equipamento->fk_idAmbiente}} </td> -->
              <td>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Visualizar
                </button>
              </td>
          </tr>
          <tr>
            <div class="collapse" id="collapseExample">
              <div class="well">
                ...
              </div>
            </div>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
@endsection
