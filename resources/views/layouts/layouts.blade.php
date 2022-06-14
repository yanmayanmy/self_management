<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Self Management</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Font Awsome -->
    <script src="https://kit.fontawesome.com/41c67361e5.js" crossorigin="anonymous"></script>

</head>
<body>

    <!-- Navbar Section -->
    <header>
        <nav class="navbar">
            <ul class="navbar__menu">
                <li class="navbar__item">
                    <a href="{{ route('todos.index') }}" class="navbar__item-link" id="project-list">TOP</a>
                </li>
                <li class="navbar__item">
                    <a href="#" class="navbar__item-link" id="project-list">PROJECT</a>
                </li>
                <li class="navbar__item">
                    <a href="#" class="navbar__item-link" id="priority-list">PRIORITY</a>
                </li>
                <li class="navbar__item">
                    <a href="#" class="navbar__item-link" id="category-list">CATEGORY</a>
                </li>
                <li>
                    <a href="{{ route('todos.create') }}" class="btn btn-lg m-2 navbar__item-link--create">
                        <i class="fa-regular fa-calendar-plus" style="color: #fff;"></i>
                    </a>
                </li>
            </ul>
        </nav>
        
        <div class="menu-btn" id="mobile-menu">
                <span class="bar"></span>
        </div>
    </header>
    

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