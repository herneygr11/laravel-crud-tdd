<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">

        <header class="header navbar navbar-expand-lg navbar-light bg-light">
            <span class="header__title">
                LCT
            </span>
            <nav class="nav collapse navbar-collapse">
                <ul class="nav__content-item navbar-nav ml-auto">
                    <li class="nav__item nav-item">
                        <a href="#" class="nav-link">Categorias</a>
                    </li>
                    <li class="nav__item nav-item">
                        <a href="#" class="nav-link">Estados</a>
                    </li>
                    <li class="nav__item nav-item">
                        <a href="#" class="nav-link">Grupos</a>
                    </li>
                </ul>
            </nav>
        </header>

        <main class="main">
            @yield('main')
        </main>

        <footer class="footer">
            <span>
                Develop by
                <a href="https://github.com/herneygr11" target="_blank">Herney Ruiz</a>
            </span>
        </footer>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>