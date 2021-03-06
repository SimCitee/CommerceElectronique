@extends('admin.layout')

@section('breadcrumbs')
    {!! Breadcrumbs::render('users_edit', $user) !!}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row spacing">
            <div class="col-md-8 col-md-offset-2">
                <h1>
                    {{ Lang::get('users.edit_user') . ' ' . $user->first_name . ' ' . $user->last_name }}
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="row">
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div class="box">
                    {!! Form::open(['action' => ['Admin\UsersController@update', $user->id], 'class' => 'form-horizontal', 'method' => 'PUT']) !!}
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div>
                            <h3>
                                {{ Lang::get('users.personnal_information') }}
                            </h3>
                        </div>
                        <div class="form-group {{ $errors->first('first_name') ? 'has-error' : '' }}">
                            <label for="firstname" class="col-sm-2 control-label">{{ Lang::get('users.firstname') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="firstname" name="first_name" maxlength="100" placeholder="{{ Lang::get('users.firstname') }}" value="{{ old('first_name') ? old('first_name') : $user->first_name }}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('last_name') ? 'has-error' : '' }}">
                            <label for="lastname" class="col-sm-2 control-label">{{ Lang::get('users.lastname') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="lastname" name="last_name" maxlength="100" placeholder="{{ Lang::get('users.lastname') }}" value="{{ old('last_name') ? old('last_name') : $user->last_name }}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('birth_date') ? 'has-error' : '' }}">
                            <label for="birthdate" class="col-sm-2 control-label">{{ Lang::get('users.birthdate') }}</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="birthdate" name="birth_date" maxlength="10" placeholder="{{ Lang::get('users.birthdate') }}" value="{{ old('birth_date') ? old('birth_date') : $user->birth_date }}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('phone') ? 'has-error' : '' }}">
                            <label for="phonenumber" class="col-sm-2 control-label">{{ Lang::get('users.phonenumber') }}</label>
                            <div class="col-sm-10">
                                <input type="tel" class="form-control" id="phonenumber" name="phone" maxlength="25" placeholder="{{ Lang::get('users.phonenumber') }}" value="{{ old('phone') ? old('phone') : $user->phone }}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('email') ? 'has-error' : '' }}">
                            <label for="email" class="col-sm-2 control-label">{{ Lang::get('users.email') }}</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" maxlength="150" placeholder="{{ Lang::get('users.email') }}" value="{{ old('email') ? old('email') : $user->email }}">
                            </div>
                        </div>

                        <hr/>

                        <div>
                            <h3>
                                {{ Lang::get('users.address_information') }}
                            </h3>
                        </div>
                        <div class="form-group {{ $errors->first('street_number') ? 'has-error' : '' }}">
                            <label for="street_number" class="col-sm-2 control-label">{{ Lang::get('users.street_number') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="street_number" name="street_number" maxlength="6" placeholder="{{ Lang::get('users.street_number') }}" value="{{ old('street_number') ? old('street_number') : $user->address->street_number }}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('street_name') ? 'has-error' : '' }}">
                            <label for="street_name" class="col-sm-2 control-label">{{ Lang::get('users.street_name') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="street_name" name="street_name" maxlength="150" placeholder="{{ Lang::get('users.street_name') }}" value="{{ old('street_name') ? old('street_name') : $user->address->street_name }}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('apartment') ? 'has-error' : '' }}">
                            <label for="apartment" class="col-sm-2 control-label">{{ Lang::get('users.apartment') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="apartment" name="apartment" maxlength="150" placeholder="{{ Lang::get('users.apartment') }}" value="{{ old('apartment') ? old('apartment') : $user->address->apartment }}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('city') ? 'has-error' : '' }}">
                            <label for="city" class="col-sm-2 control-label">{{ Lang::get('users.city') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="city" name="city" maxlength="100" placeholder="{{ Lang::get('users.city') }}" value="{{ old('city') ? old('city') : $user->address->city }}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('province') ? 'has-error' : '' }}">
                            <label for="province" class="col-sm-2 control-label">{{ Lang::get('users.province') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="province" name="province" maxlength="100" placeholder="{{ Lang::get('users.province') }}" value="{{ old('province') ? old('province') : $user->address->province }}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('country') ? 'has-error' : '' }}">
                            <label for="country" class="col-sm-2 control-label">{{ Lang::get('users.country') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="country" name="country" maxlength="100" placeholder="{{ Lang::get('users.country') }}" value="{{ old('country') ? old('country') : $user->address->country }}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('zip_code') ? 'has-error' : '' }}">
                            <label for="zip_code" class="col-sm-2 control-label">{{ Lang::get('users.zip_code') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="zip_code" name="zip_code" maxlength="20" placeholder="{{ Lang::get('users.zip_code') }}" value="{{ old('zip_code') ? old('zip_code') : $user->address->zip_code }}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('latitude') ? 'has-error' : '' }}">
                            <label for="latitude" class="col-sm-2 control-label">{{ Lang::get('users.latitude') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="latitude" name="latitude" maxlength="9" placeholder="{{ Lang::get('users.latitude') }}" value="{{ old('latitude') ? old('latitude') : $user->address->latitude }}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('longitude') ? 'has-error' : '' }}">
                            <label for="longitude" class="col-sm-2 control-label">{{ Lang::get('users.longitude') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="longitude" name="longitude" maxlength="9" placeholder="{{ Lang::get('users.longitude') }}" value="{{ old('longitude') ? old('longitude') : $user->address->longitude }}">
                            </div>
                        </div>

                        <hr/>

                        <div>
                            <h3>
                                {{ Lang::get('users.account_information') }}
                            </h3>
                        </div>
                        <div class="form-group {{ $errors->first('username') ? 'has-error' : '' }}">
                            <label for="username" class="col-sm-2 control-label">{{ Lang::get('users.username') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="username" name="username" maxlength="150" placeholder="{{ Lang::get('users.username') }}" value="{{ old('username') ? old('username') : $user->username }}">
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

                        <hr />

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success">
                                    <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                                    {{ Lang::get('actions.save') }}
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection