<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <!-- <link rel="stylesheet" href="{{asset('auth/assets/css/main.css')}}"> -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <style>
        /* Navbar Styles */
        .navbar {
            background-color: #343a40; /* لون خلفية داكن */
            padding: 1rem; /* حشوة إضافية */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* تأثير ظل أقوى */
        }

        .navbar-brand {
            font-size: 1.8rem; /* حجم خط أكبر */
            font-weight: bold;
            color: #ffffff; /* لون النص أبيض */
            text-align: center; /* محاذاة في المنتصف */
            margin-right:100px ;
        }

        .nav-link {
            color: #f8f9fa; /* لون الروابط */
            font-size: 1.5rem; /* حجم خط أكبر */
            padding: 0.5rem 1rem; /* حشوة للروابط */
            transition: color 0.3s; /* تأثير الانتقال */
        }

        .nav-link:hover {
            color: #ff5722; /* لون عند التمرير */
            text-decoration: none; /* إضافة خط تحت النص عند التمرير */

        }

        .dropdown-menu {
            background-color: #495057; /* لون خلفية القائمة المنسدلة */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* تأثير الظل للقائمة المنسدلة */
        }

        .dropdown-item {
            color: #ffffff; /* لون النص */
        }

        .dropdown-item:hover {
            background-color: #ff5722; /* لون الخلفية عند التمرير فوق العنصر */
            color: white; /* لون النص عند التمرير فوق العنصر */
        }
    </style>

    <div id="app">
        <nav class="navbar navbar-expand-md">
            <div class="container-fluid">
                <a class="navbar-brand mx-auto" href="{{ url('/') }}">
                    <strong>{{ config('app.name', 'Laravel') }}</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
