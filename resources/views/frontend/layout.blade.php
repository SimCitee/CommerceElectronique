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
                    <li><a href="/"></a></li>
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
                        <label style="float: left; width: auto; clear: both;">Shopping cart</label>
                        <span style="float: left;"><span class="count">0</span>&nbsp;items in your cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('frontend.menu')
@endsection