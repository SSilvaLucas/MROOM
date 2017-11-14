<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>MROOM - @yield('title')</title>
    {{Html::style('css/bootstrap.min.css')}}
    {{Html::style('css/bootstrap-thema.min.css')}}
    {{Html::style('css/style-listas.css')}}
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/historico">
                        <img alt="Brand MROOM" src="../../public/img/Castrolanda-MROOM.png">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="/historico">Reservas <span class="sr-only">(current)</span></a></li>
                        <li><a href="/ambientes">Ambientes</a></li>
                        <li><a href="/equipamentos">Equipamentos</a></li>
                        <li><a href="#">Manutenções</a></li>
                        <li><a href="/usuarios">Usuários</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lucas <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Minha Conta</a></li>
                                <li><a href="#">Configurações do Sitema</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container-fluid">

    @yield('conteudo')

    </main>
    {{Html::script('js/jquery-3.2.1.min.js')}}
    {{Html::script('js/bootstrap.min.js')}}
</body>
</html>
