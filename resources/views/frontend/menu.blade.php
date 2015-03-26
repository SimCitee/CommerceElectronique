<div class="menu">
    <div class="container">
        <div class="row">
            <div class="col-md-1 menu-item">
                <div class="menu-label"><a href="{{ action('HomeController@index') }}">{{ Lang::get('menu.home') }}</a></div>
            </div>
            <div class="col-md-1 menu-item">
                <div class="menu-label"><a href="#">{{ Lang::get('menu.boardgames') }}</a></div>
                <div class="menu-item-popup XfastTransition">
                    <div class="wrapper">
                    </div>
                </div>
            </div>
            <div class="col-md-1 menu-item">
                <div class="menu-label"><a href="#">{{ Lang::get('menu.accessories') }}</a></div>
            </div>
            <div class="col-md-1 menu-item">
                <div class="menu-label"><a href="#"> {{ Lang::get('menu.on_sale') }}</a></div>
            </div>
            <div class="col-md-3 col-md-offset-5 search-col">
                <div class="search">
                    {!! Form::open(['action' => 'UserSearchController@index', 'class' => 'form-horizontal', 'method' => 'GET']) !!}
                    <div class="input-group">
                        <input type="text" class="form-control" name="query" placeholder="{{ Lang::get('general.enter_keywork') }}">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@section('layout-script')
    <script>
        jQuery(document).ready(function ($) {
            $(window).scroll(function () {
                if ($(window).scrollTop() > 70 && !$(".menu").hasClass('fixed')) {
                    $(".menu").addClass('fixed');
                }
                else if ($(window).scrollTop() < 70 && $(".menu").hasClass('fixed')) {
                    $(".menu").removeClass('fixed');
                }
            });
        });
    </script>
@endsection