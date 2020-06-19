<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>env("title")</title>
</head>

<body>
    <header class="header">
        <span class="header__title">
            LCT
        </span>
        <nav class="nav">
            <ul class="nav__content-item">
                <li class="nav__item">
                    <a href="#">Categorias</a>
                </li>
                <li class="nav__item">
                    <a href="#">Estados</a>
                </li>
                <li class="nav__item">
                    <a href="#">Grupos</a>
                </li>
            </ul>
        </nav>
    </header>

    <main class="main">
        @yield('main')
    </main>

    <footer class="footer">
        <span>Develop by <a href="#">Herney Ruiz</a></span>
    </footer>
</body>

</html>