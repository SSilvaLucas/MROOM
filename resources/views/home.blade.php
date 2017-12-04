@extends('layout.app')

@section('title','Home')

@push('css')
  {{Html::style('css/style-config.css')}}
@endpush

@section('conteudo')
  <div class="title-secao-h2 index-configuracoes">
    <h2>Bem Vindo, {{ Auth::user()->nome }} {{ Auth::user()->sobrenome }}.</h2>
    <p>Este é o sistema de reserva de ambientes da Castrolanda, aqui você pode solicitar reservas, manutenções e acompanhar a disponibilidades dos espaços da cooperativa.</p>
    <img class="img-home" src="{{url('imgs/Castrolanda-MROOM-color.png')}}" alt="simbolo de configurações">
    <p>OBS: Utilize a barra de menu no topo para navegar sobre as seções desejadas.<p>
  </div>
@endsection
