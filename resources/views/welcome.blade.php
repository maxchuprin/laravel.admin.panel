<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-image: url("{{asset('images/main.jpg')}}");
            -moz-background-size: 100% 100%; /*firefox*/
            -webkit-background-size: 100% 100%; /*Chrome*/
            -o-background-size: 100% 100%; /*Opera 9.6+*/
            background-size: 100% 100%; /*Современные браузеры*/
            color: #ffffff;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #ffffff;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        a {
            color: #0b3e6f;
            text-decoration: none;
            padding: 5px;
            margin-right: 40px;
            border: 1px solid darkblue;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                @if(Auth::user()->isDisabled())
                    <strong><a href="{{ url('/') }}">Главная</a></strong>
                @elseif(Auth::user()->isUser())
                    <strong><a href="{{ url('/user/index') }}">Кабинет</a></strong>
                    <strong><a href="{{ url('/') }}">Главная</a></strong>
                @elseif(Auth::user()->isVisitor())
                    <strong><a href="{{url('/')}}">Главная</a></strong>
                @elseif(Auth::user()->isAdministrator())
                    <strong><a href="{{ url('/admin/index') }}">Панель администратора</a></strong>
                    <strong><a href="{{ url('/') }}">Главная</a></strong>"
                @endif

                <strong>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        Выйти
                    </a>
                </strong>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

            @else
                <strong>
                    <a href="{{ route('login')  }}">Войти</a>
                </strong>

                @if (Route::has('register'))
                    <strong>
                        <a href="{{ route('register') }}">Регистрация</a>
                    </strong>
                @endif
            @endauth
        </div>
    @endif


</div>
</body>
</html>
