<?php

namespace DevRocks\Http\Controllers\Auth\Company;

use DevRocks\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Validator;
use DevRocks\Http\Requests\LoginCompanyRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $guard = 'companies';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:companies')->except('logout');
    }

    public function guard()
    {
        return auth()->guard('companies');
    }

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    public function showLoginForm()
    {
        return view('auth.company.login');
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'password' => 'required',
        ]);

        $credentials = $request->only(['email', 'password']);

        Auth::guard('companies')->attempt($credentials);

        return redirect()->route('companies.admin');

        // if (Auth::guard('companies')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
        //     return redirect()->intended('/dashboard');
        // }
        // return back()->withInput($request->only('email', 'password'));
        // if (auth()->guard('companies')->attempt(['email' => $request->email, 'password' => $request->password ])) {
        //     return redirect()->route('companies.admin');
        // }
        // return back()->withErrors(['email' => 'Email or password are wrong.']);
    }
}
