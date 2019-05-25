<?php

namespace DevRocks\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use DevRocks\Http\Controllers\Controller;

use Auth;
use DevRocks\Models\User;

class AuthenticateController extends Controller
{
    public function register(Request $request)
    {
        // Validate fields
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'unique:users|email',
            'password' => 'required',
            'phone' => 'required|unique:users|min:9|max:12',
            'photo' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => [
                    $validator->errors(),
                ],
            ], 401);
        }

        // Create a new User
        $user = User::firstOrNew([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'firebase_token' => $request->firebase_token,
        ]);

        if ($request->input('photo')) {
            // Create a name for the file
            $file = $request->input('photo');

            $extension = \File::extension($file);

            $filename = str_slug($user->name) . '_' . time(). $extension;

            
        }

    }
}
