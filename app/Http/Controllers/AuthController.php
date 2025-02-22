<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller {

    public function login(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8', 
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors(['data' => 'The data you entered is not valid']);
        }

        $user = User::where('email', $_POST['email']) -> first();
        
        if ($user && Hash::check($_POST['password'], $user -> password)) {

            Session::put('user_id', $user -> id);
            Session::put('email', $user -> email);
            Session::put('full_name', $user -> full_name);

            return Redirect::to('/questions');

        } else {
            return Redirect::back()->withErrors(['data' => 'Email or Password are incorrect']);
        }
    }

    public function register(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',  // Ensure email is unique
            'password' => 'required|min:8|confirmed',        // Ensure password confirmation matches
            'name' => 'required|string|between:3,50',        // Ensure full name is provided
        ]);


        if ($validator->fails()) {
            return Redirect::back()->withErrors(['data' => 'The data you entered is not valid']);
        }

        $user = User::where('email', $_POST['email']) -> first();
        
        if ($user) {
            return Redirect::back()->withErrors(['data' => 'This user already Exists']);
        }

        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->full_name = $request->name;
        $user->save();
            
        Session::put('user_id', $user -> id);
        Session::put('email', $user -> email);
        Session::put('full_name', $user -> full_name);

        return Redirect::to('/questions');
    }

    public function logout() {

        Session::forget('user_id', 'email', 'full_name');

        return Redirect::to('/login');
    }
}