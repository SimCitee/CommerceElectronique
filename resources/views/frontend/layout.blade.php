@extends('app')

@section('header')
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"></a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Config::get('languages')[App::getLocale()] }}&nbsp;&nbsp;
                            @if (App::getLocale() == "en")
                                <img u="image" src="./img/icons/languageFlagEN.png" />
                            @else
                                <img u="image" src="./img/icons/languageFlagFR.png" />
                            @endif
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                    <li>
                                        <a href="{{ action('LanguageController@switchLang',$lang) }}">
                                            {{$language}}
                                            &nbsp;&nbsp;
                                            @if (App::getLocale() == "en")
                                                <img u="image" src="./img/icons/languageFlagFR.png" />
                                            @else
                                                <img u="image" src="./img/icons/languageFlagEN.png" />
                                            @endif
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ action('Auth\AuthController@getLogin') }}">Login</a></li>
                        <li><a href="{{ action('Auth\AuthController@getRegister') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->first_name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ action('Auth\AuthController@getLogout') }}">Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container medium-bottom-margin">
        <div class="row">
            <div class="col-md-2 col-md-offset-10 shopping-cart">
                <div class="row">
                    <div class="col-md-1 shopping-cart-icon">
                        <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-10 summary-container">
                        <label style="float: left; width: auto; clear: both;">{{Lang::get('products.shopping_cart')}}</label>
                        <a href="{{ action('CartController@index') }}"><span style="float: left;"><span class="count">{{Cart::count()}}</span>&nbsp;{{Lang::get('products.items_in_your_cart')}}</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('frontend.menu')
@endsection