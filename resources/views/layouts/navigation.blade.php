<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('about') }}">О нас</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('catalog') }}">Каталог</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Где нас найти?</a>
                </li>
            </ul>
            @guest
                <div class="d-flex gap-1">
                    <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                    <b> или </b>
                    <a class="nav-link" href="{{ route('login') }}">Авторизация</a>
                </div>
            @endguest
            @auth
                <div class="d-flex gap-2">
                    <a class="nav-link" href={{ route('dashboard') }}>Профиль</a>
                    <a class="nav-link" href={{ route('cart') }}>Корзина</a>
                </div>
            @endauth
        </div>
    </div>
</nav>