<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/solid.css" integrity="sha384-Tv5i09RULyHKMwX0E8wJUqSOaXlyu3SQxORObAI08iUwIalMmN5L6AvlPX2LMoSE" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/fontawesome.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script defer src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
    $( function() {
    //   $( "#datepicker" ).datepicker(); Анхны утгыг бас ашиглаж болно.
    $("#datepicker").datepicker({
        dateFormat: 'yy-mm-dd'
    }).val();
    } );
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Нэвтрэх') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Ажил хайгчаар бүртгүүлэх') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('employer.create') }}">{{ __('Ажил олгогчоор бүртгүүлэх') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if(Auth::user()->user_type === 'employer')
                                        {{ Auth::user()->company->cname }}
                                    @else
                                         {{ Auth::user()->name }}
                                    @endif
                                    
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    
                                        @if(Auth::user()->user_type === 'employer')
                                        <a class="dropdown-item" href="{{ route('company.create') }}">
                                        {{ __('Компани мэдээлэл') }} </a>

                                        <a class="dropdown-item" href="{{ route('jobs.create') }}">
                                        {{ __('Ажлын байр  үүсгэх') }} </a>

                                        <a class="dropdown-item" href="{{ route('myjob') }}">
                                        {{ __('Ажлын байрны жагсаалт') }} </a>

                                        <a class="dropdown-item" href="{{ route('applicants') }}">
                                        {{ __('Ажилд орох хүсэлтүүд') }} </a>
                                        @else
                                        <a class="dropdown-item" href="{{ route('user.profile') }}">
                                            {{ __('Профайл шинэчлэх') }} </a>
                                        <a class="dropdown-item" href="{{ route('home') }}">
                                            {{ __('Ажлын байрны жагсаалт') }} </a>
                                            
                                        @endif

                                        {{-- @if(Auth::user()->user_type === 'simple_user')
                                        <a class="dropdown-item" href="{{ route('user.profile') }}">
                                            {{ __('Профайл шинэчлэх') }} </a>
                                        @else
                                        @endif    --}}

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
