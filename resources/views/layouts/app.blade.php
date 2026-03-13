<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Mon Site Laravel')</title>
    <style>
        * {margin:0; padding:0; box-sizing:border-box;}
        body {font-family:Arial;}
        nav {background:#FF2D20; padding:20px; box-shadow:0 2px 5px rgba(0,0,0,0.1);}
        nav ul {list-style:none; display:flex; gap:20px;}
        nav a {color:white; text-decoration:none; font-weight:bold; padding:10px 15px; border-radius:5px;}
        nav a:hover {background: rgba(255,255,255,0.2);}
        .container {max-width:1200px; margin:40px auto; padding:20px;}
        footer {background:#333; color:white; text-align:center; padding:30px; margin-top:50px;}
    </style>
    @yield('styles')
</head>
<body>
    <nav>
        <ul>
            <li><a href="/">Accueil</a></li>
            <li><a href="/about">À propos</a></li>
            <li><a href="/services">Services</a></li>
            <li><a href="/blog">Blog</a></li>
            <li><a href="/contact">Contact</a></li>
            <li><a href="/tasks">Tâches</a></li>
        </ul>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <footer>
        <p>&copy; {{ date('Y') }} Mon Site Laravel. Tous droits réservés.</p>
    </footer>
    @yield('scripts')
</body>
</html>
