<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MROOM - @yield('title')</title>
    {{Html::style('css/bootstrap.min.css')}}
    {{Html::style('css/bootstrap-thema.min.css')}}
    {{Html::style('css/style-sistema.css')}}
    @stack('css')
</head>

<body>
    <header>
        <nav class="barra-nav-mobile">
            <header class="cabecalho-menu-mobile">
                <h1>MROOM</h1>
                <button class="fecha-menu">
                    <span class="glyphicon glyphicon-remove-sign"></span>
                </button>
            </header>
            <ul class="menu-principal-mobile">
              @guest
                <li>
                  <a href="{{ route('login') }}">
                    <span class="glyphicon glyphicon-log-in"></span> Login
                  </a>
                </li>
                <li>
                  <a href="{{ route('register') }}">
                    <span class="glyphicon glyphicon-save"></span> Registrar
                  </a>
                </li>
              @else
                <li>
                    <a href="#link-carousel">
                      <span class="glyphicon glyphicon-time"></span> Reservas
                    </a>
                </li>
                <li>
                    <a href="#link-sobre">
                      <span class="glyphicon glyphicon-map-marker"></span> Ambientes
                    </a>
                </li>
                <li>
                    <a href="#link-atividade">
                      <span class="glyphicon glyphicon-facetime-video"></span> Equipamentos
                    </a>
                </li>
                <li>
                    <a href="#link-programacao">
                      <span class="glyphicon glyphicon-wrench"></span> Manutenções
                    </a>
                </li>
                <li>
                    <a href="#link-organizacao">
                      <span class="glyphicon glyphicon-stats"></span> Usuários
                    </a>
                </li>
                <li role="separator" class="divider"></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lucas <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span>  Minha Conta</a></li>
                        <li><a href="/configuracoes"><span class="glyphicon glyphicon-cog"></span>  Configurações do Sitema</a></li>
                        <li role="separator" class="divider"></li>
                        <li>
                          <a href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                            <span class="glyphicon glyphicon-log-out"></span>  Sair
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                        </li>
                    </ul>
                </li>
              @endguest
            </ul>
        </nav>
        <div class="barra-cabecalho">
          <div class="logo-mroom">
              <img src="{{url('imgs/Castrolanda-MROOM.png')}}" alt="Brand MROOM">
          </div>
          <button class="abre-menu">
              <div class="btn-abre-menu">
                <span class="glyphicon glyphicon-menu-hamburger"></span>
                <p>menu</p>
              </div>
          </button>
          <nav class="barra-nav-desktop">
            @guest
              <ul class="menu-principal">
                <li>
                  <a style="text-decoration:none" class="iten-desktop" href="{{ route('login') }}">
                    <span class="glyphicon glyphicon-log-in"></span>
                    <p>Login</p>
                  </a>
                </li>
                <li>
                  <a style="text-decoration:none" class="iten-desktop" href="{{ route('register') }}">
                    <span class="glyphicon glyphicon-save"></span>
                    <p>Registrar</p>
                  </a>
                </li>
              </ul>
            @else
              <ul class="menu-principal">
                <li>
                  <a style="text-decoration:none" class="iten-desktop" href="/historico">
                    <span class="glyphicon glyphicon-time"></span>
                    <p>Reservas</p>
                  </a>
                </li>
                <li>
                  <a style="text-decoration:none" class="iten-desktop" href="/ambientes">
                    <span class="glyphicon glyphicon-map-marker"></span>
                    <p>Ambientes</p>
                  </a>
                </li>
                <li>
                  <a style="text-decoration:none" class="iten-desktop" href="/equipamentos">
                    <span class="glyphicon glyphicon-facetime-video"></span>
                    <p>Equipamentos</p>
                  </a>
                </li>
                <li>
                  <a style="text-decoration:none" class="iten-desktop" href="#">
                    <span class="glyphicon glyphicon-wrench"></span>
                    <p>Manutenções</p>
                  </a>
                </li>
                <li>
                  <a style="text-decoration:none" class="iten-desktop" href="/usuarios">
                    <span class="glyphicon glyphicon-stats"></span>
                    <p>Usuários</p>
                  </a>
                </li>
              </ul>
              <div class="dropdown navbar-right">
                  <a id="dropdown-nav" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->nome }} <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                      <li><a href="#"><span class="glyphicon glyphicon-user"></span>  Minha Conta</a></li>
                      <li><a href="/configuracoes"><span class="glyphicon glyphicon-cog"></span>  Configurações do Sitema</a></li>
                      <li role="separator" class="divider"></li>
                      <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                   document.getElementById('logout-form').submit();">
                           <span class="glyphicon glyphicon-log-out"></span>  Sair
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                      </li>
                  </ul>
              </div>
            @endguest
          </nav>

        </div>
    </header>
    <main class="container-fluid main-body">

    @yield('conteudo')

    </main>
    {{Html::script('js/jquery-3.2.1.min.js')}}
    {{Html::script('js/bootstrap.min.js')}}
    {{Html::script('js/banner-collepse.js')}}
    {{Html::script('js/menu.js')}}
    @stack('scripts')
</body>
</html>
