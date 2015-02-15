@extends('admin.layout')

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
                        <th>{{ Lang::get('actions.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr id="user_{{ $user->id }}_row">
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
                            <td>
                                <a class="actions" href="{{ action('Admin\UsersController@show', $user->id) }}">
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                </a>
                                <a class="actions" href="{{ action('Admin\UsersController@edit', $user->id) }}">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </a>

                                {!! Form::open(['action' => ['Admin\UsersController@destroy', $user->id], 'id' => 'user'.$user->id, 'class' => 'delete-form inline', 'method' => 'DELETE']) !!}
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <button class="btn btn-default plain" type="submit">
                                        <a class="actions" href="{{ action('Admin\UsersController@destroy', $user->id) }}">
                                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        </a>
                                    </button>

                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {!! HTML::script('js/jquery.form.min.js') !!}
    <script>
        $(document).ready(function() {
            var options = {
                success:       showResponse
            };

            $('.delete-form').submit(function() {
                $(this).ajaxSubmit(options);
                return false;
            });
        });

        function showResponse(responseText, statusText, xhr, $form)  {
            if (parseInt(responseText) > 0) {
                $('#user_'+responseText+'_row').remove();
            }
        }
    </script>
@endsection
