@extends('layout.config')

@section('secao-config')

<div class="title-secao-h2 index-configuracoes">
  <h2>Seção de configurações de cadastro</h2>
  <p>Esta seção é exclusiva para administradores. Todos os dados cadastrados, alterados ou excluído aqui refletem nos formulários de cadastro para os demais usuários do sistema.</p>
  <img class="img-configuracoes" src="{{url('imgs/configuracoes.png')}}" alt="simbolo de configurações">
  <p class="obs-danger">OBS: Tome cuidado ao alterar, adicionar ou excluir dados, uma ação mal tomado poderá comprometer o sistema.<p>
</div>
@endsection
