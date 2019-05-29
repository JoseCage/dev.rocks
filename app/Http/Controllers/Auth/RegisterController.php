<?php

namespace DevRocks\Http\Controllers\Auth;

use DevRocks\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;

use DevRocks\Models\User;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
        $this->middleware('guest:companies');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'min:9', 'max:15'],
            //'photo' => ['required', 'string', 'image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \DevRocks\Models\User
     */
    protected function create(array $data)
    {
        $request = request();

        $fileName = 'null';
    if (input::file('photo')) {
        $destinationPath = public_path('avatars');
        $extension = Input::file('photo')->getClientOriginalExtension();
        $fileName =  'profile_' . uniqid().'.'.$extension;

        Input::file('photo')->move($destinationPath, $fileName);
    }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'photo' => $fileName,
            'password' => Hash::make($data['password']),
        ]);

        // Send the confirmation email after registration
    }

    public function showCompanyRegistrationForm()
    {
        return view('auth.company.register');
    }

    public function createCompany(Request $request)
    {
        $this->validator($request->all())->validate();


        $company = Company::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'logo' => $request['logo'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->intended('login/companies');
    }
}
