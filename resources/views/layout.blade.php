<!DOCTYPE>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Todo App</title>
        @yield('styles')
        <link rel="stylesheet" href="/css/styles.css">
    </head>
    <body>
        <header>
            <nav class="my-navbar">
                <a class="my-navbar-bland" href="/">ToDo App</a>
                <div class="my-navbar-contol">
                    @if(Auth::check())
                        <span class="my-navbar-item">Hello, {{Auth::user()->name}}</span>
                        <a href="#" id="logout" class="my-navbar-item">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                    <a class="my-navbar-item" href="{{ route('login') }}">Login</a>
                    <a class="my-navbar-item" href="{{ route('register') }}">Register</a>
                    @endif
                </div>
            </nav>
        </header>
        <main>
            @yield('content')
        </main>
        @if(Auth::check())
            <script>
                document.getElementById('logout').addEventListener('click', function(event){
                    event.preventDefault();
                    document.getElementById('logout-form').submit();
                });
            </script>
        @endif
        @yield('scripts')
    </body>
</html>