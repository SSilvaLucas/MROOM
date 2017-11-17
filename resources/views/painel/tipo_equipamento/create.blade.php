@extends('layout.config')

@section('secao-config')
  <h3 class="title-secao-h3">Formulário para cadastrar novo tipo de equipamento:</h3>
  <div class="form-config">
    <form class="form" method="POST" action="{{url("/configuracoes/tipos-equipamentos/store")}}">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="nome">Nome do tipo de equipamento: </label>
            <input name="nome" type="text" class="form-control" placeholder="Nome do tipo" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição sobre o tipo de equipamento: </label>
            <textarea form="form_descricao" name="descricao" class="form-control" maxlength="200" rows="4" cols="50" required></textarea>
        </div>
        <div class="btns-cadastro">
            <a class="btn btn-primary btn-form" href="javascript:history.go(-1)" type="submit">Voltar</a>
            <button class="btn btn-success btn-form" type="submit">Cadastrar</button>
        </div>
    </form>
@endsection
