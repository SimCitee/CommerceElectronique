<?php namespace App\Http\Controllers\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\Address;
use App\Models\Group;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard  $auth
     * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
     * @return void
     */
    public function __construct(Guard $auth, Registrar $registrar)
    {
        $this->auth = $auth;
        $this->registrar = $registrar;

        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function postRegister(CreateUserRequest $request)
    {
        $addressInput = $request->only('street_number', 'street_name', 'city', 'province', 'country', 'zip_code', 'latitude', 'longitude');
        $address = Address::create($addressInput);

        $userInput = $request->except($addressInput);
        $userInput['address_id'] = $address->id;
        $userInput['password'] = bcrypt($userInput['password']);
        User::create($userInput);

        return redirect('/');
    }
}