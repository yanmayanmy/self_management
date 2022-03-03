<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Self Management</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">

    <!-- bootstrap -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Font Awsome -->
    <script src="https://kit.fontawesome.com/41c67361e5.js" crossorigin="anonymous"></script>

    <!-- My own CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>

    <!-- Navbar Section -->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="#home" id="navbar-logo" class="theme">TODOS</a>
            <div class="navbar-toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="navbar-menu">
                <li class="navbar-item">
                    <a href="#home" class="navbar-links" id="home-page">HOME</a>
                </li>
                <li class="navbar-item">
                    <a href="#about" class="navbar-links" id="about-page">PROJECT</a>
                </li>
                <li class="navbar-item">
                    <a href="#services" class="navbar-links" id="services-page">CATEGORY</a>
                </li>
                <li>
                    <a href="{{ route('todos.create') }}" class="btn theme btn-lg m-2">
                        <i class="fa-regular fa-calendar-plus" style="color: #fff;"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main contents -->
    <main class="main-container">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer-container">
        <p>&copy; Yuta Yamauchi</p>
    </footer>
</body>
</html>