<?php

namespace DevRocks\Http\Controllers\Auth;

use DevRocks\Models\User;
use DevRocks\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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

        //if ($request->file('photo')) {

            // $file = $request->file('photo');
            //
            // //$user = User::where($data->email);
            //
            // //$extension = \File::extension($file);
            //
            // // Create a name for the file
            // $filename = 'avatar' . '_' . time() . '.png';
            //
            // Storage::put($file);

            //$user->photo = $filename;
            //$user->save();
            //dd($filename);
        //}
        //$file = $request->file('photo')->store('avatars');
        //$file = Storage::putFile('avatars', $request->file('photo'));
        $fileName = 'null';
    if (input::file('photo')->isValid()) {
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
}
