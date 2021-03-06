<?php

namespace DevRocks\Http\Controllers\Auth;

use DevRocks\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use DevRocks\Http\Requests\LoginCompanyRequest;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/me';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:companies')->except('logout');
    }

    public function showCompanyLoginForm()
    {
        return view('auth.company.login');
    }

    public function companyLogin(LoginCompanyRequest $request)
    {

        if (Auth::guard('companies')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/dashboard');
        }
        return back()->withInput($request->only('email', 'password'));
    }
}
