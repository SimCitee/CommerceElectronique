@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row spacing">
            <div class="col-md-8 col-md-offset-2">
                <h1>
                    {{ $user->first_name . ' ' . $user->last_name }}
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box">
                    <form class="form-horizontal">
                        <div>
                            <h3>
                                {{ Lang::get('users.personnal_information') }}
                            </h3>
                        </div>
                        <div class="form-group no-bottom-margin">
                            <label for="firstname" class="col-sm-2 control-label">{{ Lang::get('users.firstname') }}</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $user->first_name }}</p>
                            </div>
                        </div>
                        <div class="form-group no-bottom-margin">
                            <label for="lastname" class="col-sm-2 control-label">{{ Lang::get('users.lastname') }}</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $user->last_name }}</p>
                            </div>
                        </div>
                        <div class="form-group no-bottom-margin">
                            <label for="birthdate" class="col-sm-2 control-label">{{ Lang::get('users.birthdate') }}</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $user->birth_date }}</p>
                            </div>
                        </div>
                        <div class="form-group no-bottom-margin">
                            <label for="phonenumber" class="col-sm-2 control-label">{{ Lang::get('users.phonenumber') }}</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $user->phone }}</p>
                            </div>
                        </div>
                        <div class="form-group no-bottom-margin">
                            <label for="email" class="col-sm-2 control-label">{{ Lang::get('users.email') }}</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $user->email }}</p>
                            </div>
                        </div>

                        <hr/>

                        <div>
                            <h3>
                                {{ Lang::get('users.address_information') }}
                            </h3>
                        </div>
                        <div class="form-group no-bottom-margin">
                            <label for="street_number" class="col-sm-2 control-label">{{ Lang::get('users.street_number') }}</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $user->address->street_number }}</p>
                            </div>
                        </div>
                        <div class="form-group no-bottom-margin">
                            <label for="street_name" class="col-sm-2 control-label">{{ Lang::get('users.street_name') }}</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $user->address->street_name }}</p>
                            </div>
                        </div>
                        <div class="form-group no-bottom-margin">
                            <label for="apartment" class="col-sm-2 control-label">{{ Lang::get('users.apartment') }}</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $user->address->apartment or Lang::get('general.not_specified') }}</p>
                            </div>
                        </div>
                        <div class="form-group no-bottom-margin">
                            <label for="city" class="col-sm-2 control-label">{{ Lang::get('users.city') }}</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $user->address->city }}</p>
                            </div>
                        </div>
                        <div class="form-group no-bottom-margin">
                            <label for="province" class="col-sm-2 control-label">{{ Lang::get('users.province') }}</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $user->address->province }}</p>
                            </div>
                        </div>
                        <div class="form-group no-bottom-margin">
                            <label for="country" class="col-sm-2 control-label">{{ Lang::get('users.country') }}</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $user->address->country }}</p>
                            </div>
                        </div>
                        <div class="form-group no-bottom-margin">
                            <label for="zip_code" class="col-sm-2 control-label">{{ Lang::get('users.zip_code') }}</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $user->address->zip_code }}</p>
                            </div>
                        </div>
                        <div class="form-group no-bottom-margin">
                            <label for="latitude" class="col-sm-2 control-label">{{ Lang::get('users.latitude') }}</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $user->address->latitude }}</p>
                            </div>
                        </div>
                        <div class="form-group no-bottom-margin">
                            <label for="longitude" class="col-sm-2 control-label">{{ Lang::get('users.longitude') }}</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $user->address->longitude }}</p>
                            </div>
                        </div>

                        <hr/>

                        <div>
                            <h3>
                                {{ Lang::get('users.account_information') }}
                            </h3>
                        </div>
                        <div class="form-group no-bottom-margin">
                            <label for="username" class="col-sm-2 control-label">{{ Lang::get('users.username') }}</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $user->username }}</p>
                            </div>
                        </div>
                    </form>

                    <hr />

                    <div class="row">
                        <div class="col-md-1 col-md-offset-2">
                            <a href="{{ action('Admin\UsersController@edit', $user->id) }}">
                                <button type="button" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    {{ Lang::get('actions.edit') }}
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if ($user->orders)
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="box">
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection