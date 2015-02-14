@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div>
                    {{ old('username') }}
                </div>

                <div class="box">
                    @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                           <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ action('Admin\UsersController@store') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div>
                            <h3>
                                {{ Lang::get('users.personnal_information') }}
                            </h3>
                        </div>
                        <div class="form-group {{ $errors->first('first_name') ? 'has-error' : '' }}">
                            <label for="firstname" class="col-sm-2 control-label">{{ Lang::get('users.firstname') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="firstname" name="first_name" maxlength="100" placeholder="{{ Lang::get('users.firstname') }}" value="{{ old('first_name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">{{ Lang::get('users.lastname') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="lastname" name="last_name" maxlength="100" placeholder="{{ Lang::get('users.lastname') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="birthdate" class="col-sm-2 control-label">{{ Lang::get('users.birthdate') }}</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="birthdate" name="birth_date" maxlength="10" placeholder="{{ Lang::get('users.birthdate') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phonenumber" class="col-sm-2 control-label">{{ Lang::get('users.phonenumber') }}</label>
                            <div class="col-sm-10">
                                <input type="tel" class="form-control" id="phonenumber" name="phone" maxlength="25" placeholder="{{ Lang::get('users.phonenumber') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">{{ Lang::get('users.email') }}</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" maxlength="150" placeholder="{{ Lang::get('users.email') }}">
                            </div>
                        </div>

                        <hr/>

                        <div>
                            <h3>
                                {{ Lang::get('users.address_information') }}
                            </h3>
                        </div>
                        <div class="form-group">
                            <label for="street_number" class="col-sm-2 control-label">{{ Lang::get('users.street_number') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="street_number" name="street_number" maxlength="6" placeholder="{{ Lang::get('users.street_number') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="street_name" class="col-sm-2 control-label">{{ Lang::get('users.street_name') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="street_name" name="street_name" maxlength="150" placeholder="{{ Lang::get('users.street_name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="city" class="col-sm-2 control-label">{{ Lang::get('users.city') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="city" name="city" maxlength="100" placeholder="{{ Lang::get('users.city') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="province" class="col-sm-2 control-label">{{ Lang::get('users.province') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="province" name="province" maxlength="100" placeholder="{{ Lang::get('users.province') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="country" class="col-sm-2 control-label">{{ Lang::get('users.country') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="country" name="country" maxlength="100" placeholder="{{ Lang::get('users.country') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="zip_code" class="col-sm-2 control-label">{{ Lang::get('users.zip_code') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="zip_code" name="zip_code" maxlength="20" placeholder="{{ Lang::get('users.zip_code') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="latitude" class="col-sm-2 control-label">{{ Lang::get('users.latitude') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="latitude" name="latitude" maxlength="9" placeholder="{{ Lang::get('users.latitude') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="longitude" class="col-sm-2 control-label">{{ Lang::get('users.longitude') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="longitude" name="longitude" maxlength="9" placeholder="{{ Lang::get('users.longitude') }}">
                            </div>
                        </div>

                        <hr/>

                        <div>
                            <h3>
                                {{ Lang::get('users.account_information') }}
                            </h3>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">{{ Lang::get('users.username') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="username" name="username" maxlength="150" placeholder="{{ Lang::get('users.username') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">{{ Lang::get('users.password') }}</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password" maxlength="512" placeholder="{{ Lang::get('users.password') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="repeat_password" class="col-sm-2 control-label">{{ Lang::get('users.repeat_password') }}</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="repeat_password" name="repeat_password" maxlength="512" placeholder="{{ Lang::get('users.repeat_password') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success">
                                    <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                                    {{ Lang::get('actions.save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection