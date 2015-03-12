<div class="container">
    <div class="row">
        <div class="col-md-1">
            Accueil
        </div>
        <div class="col-md-2">
            {!! Form::open(['action' => 'Admin\UsersController@store', 'class' => 'form-horizontal']) !!}
            <div class="input-group">
                <input type="text" class="form-control" id="exampleInputAmount" placeholder="{{ Lang::get('general.enter_keywork') }}">
                <div class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>