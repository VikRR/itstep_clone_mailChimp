<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset ('/css/app.css' ) }}" rel="stylesheet">
    <link href="{{ asset ('/css/style.css' ) }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <div class="col-md-2 col-md-push-9 lang">
                    <div {{ (App::isLocale('en'))? 'class=select' : '' }}>
                        <form class="locale" action="{{ action('LocalizationController@switch') }}" method="post">
                            {{ csrf_field() }}
                            <input type="text" hidden name="locale" value="en"></input>
                            <input class="input-locale" type="submit" name="submit" value="En">
                        </form>
                    </div>
                    <div {{ (App::isLocale('ua'))? 'class=select' : ''}}>
                        <form class="locale" action="{{ action('LocalizationController@switch') }}" method="post">
                            {{ csrf_field() }}
                            <input type="text" hidden name="locale" value="ua"></input>
                            <input class="input-locale" type="submit" name="submit" value="Ua">
                        </form>
                    </div>
                    <div {{ (App::isLocale('ru'))? 'class = select' : ''}}>
                        <form class="locale" action="{{ action('LocalizationController@switch') }}" method="post">
                            {{ csrf_field() }}
                            <input type="text" hidden name="locale" value="ru"></input>
                            <input class="input-locale" type="submit" name="submit" value="Ru">
                        </form>
                    </div>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">{{ trans('layoutsIndex.login') }}</a></li>
                        <li><a href="{{ url('/register') }}">{{ trans('layoutsIndex.register') }}</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->email }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ trans('layoutsindex.logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @if(Auth::user())
        @include('navbar')
    @endif

    @yield('content')
</div>

<!-- Scripts -->
<script src="/js/app.js"></script>
</body>
</html>
