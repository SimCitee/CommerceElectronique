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
                                {!! HTML::image('img/icons/languageFlagEN.png') !!}
                            @else
                                {!! HTML::image('img/icons/languageFlagFR.png') !!}
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
                                                {!! HTML::image('img/icons/languageFlagFR.png') !!}
                                            @else
                                                {!! HTML::image('img/icons/languageFlagEN.png') !!}
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
                        <li><a href="auth/login">Login</a></li>
                        <li><a href="auth/register">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->first_name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ action('Admin\AdminAuthController@getLogout') }}">Logout<span class="align-right glyphicon glyphicon-log-out" aria-hidden="true"></span></a>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endsection