<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->

                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('messages.Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        @endguest
                    </ul>
                    <ul class="navbar-nav ml-5">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ trans(App::getLocale()) }}<span class="caret"></span>
                            </a>


                            <div class="dropdown-menu dropdown-menu-right flags" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('lang/RU') }}"><img src="{{url('/storage/ru.png')}}" alt="">RU</a>
                                <a class="dropdown-item" href="{{ url('lang/EN') }}"><img src="{{url('/storage/us.png')}}" alt="">EN</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


            <section>
                <div class="row">
                    <div id="menu_s" class="col-md-3 bg-dark">
                        <ul class="pt-5 pb-5">
                            <li><a href="/main">{{ __('messages.home') }}</a></li>
                            <li><a href="/ProductsList">{{ __('messages.createproduct') }}</a></li>
                            <li><a href="/categoryList">{{ __('messages.createcategory') }}</a></li>
                            <li><a href="/createUsers">{{ __('messages.createuser') }}</a></li>
                            <li><a href="/showAllUsers">{{ __('messages.showalluser') }}</a></li>
                            <li><a href="/showAllCategories">{{ __('messages.showallcategories') }}</a></li>
                            <li><a href="/showAllProducts">{{ __('messages.showallproducts') }}</a></li>
                        </ul>
                </div>
                    <div class="col-md-9 hh">
                        @yield('content')
                    </div>
                </div>
            </section>


@extends('layouts.footer')
