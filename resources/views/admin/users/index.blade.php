@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1">
                <h1>
                    {{ Lang::get('users.users') }}
                </h1>
            </div>
            <div class="col-md-11">
            </div>
        </div>
        <div class="row">
            <div class="col-md-11"></div>
            <div class="col-md-1">
                <a href="{{ action('Admin\UsersController@create') }}">
                    <button type="button" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        {{ Lang::get('actions.add') }}
                    </button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ Lang::get('users.firstname') }}</th>
                        <th>{{ Lang::get('users.lastname') }}</th>
                        <th>{{ Lang::get('users.username') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                {{ $user->id }}
                            </td>
                            <td>
                                {{ $user->first_name }}
                            </td>
                            <td>
                                {{ $user->last_name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
