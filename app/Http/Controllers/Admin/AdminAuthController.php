<?php namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;

class AdminAuthController extends Controller {

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

    protected $auth;
    protected $registrar;
    protected $redirectTo = 'admin/users';

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

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        return view('admin.auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required', 'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        $user = User::where('email', '=', $credentials['email'])->first();

        if ($user && $user->isAdmin()) {
            if ($this->auth->attempt($credentials, $request->has('remember')))
            {
                return redirect()->intended($this->redirectPath());
            }
        }

        if (!$user) {
            return redirect('/admin/auth/login')
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'These credentials do not match our records.',
                ]);
        }
        elseif ($user && !$user->isAdmin()) {
            return redirect('/admin/auth/login')
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'These credentials do not have admin privileges.',
                ]);
        }
        else {
            return redirect('/admin/auth/login')
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'Could not log in.',
                ]);
        }
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        $this->auth->logout();

        return redirect('/admin/auth/login');
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }
}