<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    {{-- Fonte do google --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    
    {{-- Css Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- Css da Aplicação --}}
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
                <a href="/" class="nabar-brand">
                    <img src="/img/Logo ok.png" alt="LEM">
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/" class="nav-link"> PRODUTOS</a>
                    </li>
                    <li class="nav-item">
                        <a href="/events/create" class="nav-link"> CRIAR PRODUTO</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link"> MEUS PRODUTOS</a>
                    </li>
                    <li class="nav-item">
                        <form action="/logout" method="POST">
                            @csrf
                            <a href="/logout" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">
                                SAIR
                            </a>
                        </form>
                    </li>
                    @endauth
                    @guest
                    <li class="nav-item">
                        <a href="/register" class="nav-link"> CADASTRAR</a>
                    </li>
                    <li class="nav-item">
                        <a href="/login" class="nav-link"> ENTRAR</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="container-fluid">
            <div class="row">
                @if(session('msg'))
                <p class="msg">{{ session('msg') }}</p>
                @endif
                @yield('content')
            </div>
        </div>
    </main>
    <footer>
        <div class="img" id="footer">
            <img src="/img/Logo ok.png" alt="LEM">
        </div>
        <div class="info" id="footer">
            <p> Sistema de gestão de produtos educacionais &copy; 2024</p>
            <p> Universidade Federal de Juiz de Fora</p>
            <p> Suporte.pe@ice.ufjf.br</p>
            <p> (32)99##82929</p>
        </div>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    {{-- Script para esconder a mensagem após 3 segundos --}}
    <script>
        // Seleciona o elemento da mensagem
        var msgElement = document.querySelector('.msg');
        
        // Verifica se o elemento existe e executa o código apenas se existir
        if (msgElement) {
            // Define um temporizador para esconder a mensagem após 3 segundos
            setTimeout(function() {
                msgElement.style.display = 'none'; // Esconde o elemento
            }, 3000); // 3000 milissegundos = 3 segundos
        }
    </script>
</body>
</html>
