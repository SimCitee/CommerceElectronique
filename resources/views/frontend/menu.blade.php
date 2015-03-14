<div class="container">
    <div class="row">
        <div class="col-md-1">
            Accueil
        </div>
        <div class="col-md-3">
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