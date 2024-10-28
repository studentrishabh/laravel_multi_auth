<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // this method show login page for customer
    public function index(){

        return view('login');
    }

    // this  method will authenticate for user 
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required|string", // Change 'password' to 'string' for validation
        ]);
    
        if ($validator->passes()) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('account.dashboard');
            } else {
                return redirect()->route('account.login')->with('error', 'Either email or password is incorrect');
            }
        } else {
            return redirect()->route('account.login')->withInput()->withErrors($validator);
        }
    }
    
    public function register()
    {
        return view('register');
    }
    
    public function processRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255', // Ensure name is validated
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:6', // Ensure password is a string and has a minimum length
        ]);
    
        if ($validator->passes()) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
    
            return redirect()->route('account.login')->with('success', 'You have registered successfully');
        } else {
            return redirect()->route('account.register')->withInput()->withErrors($validator);
        }
    }


    public function logout(){

        return redirect()->route('account.login');
    }
    
}
