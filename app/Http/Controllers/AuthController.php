<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function index(){
        return view('login');
    }

    public function proses_login(Request $request){
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ]
        );

        $credential = $request->only('username','password');

        if (Auth::attempt($credential)) {
            $user = Auth::user();

            if ($user->level == 'admin') {
                return redirect()->intended('admin');
            } elseif ($user->level == 'advisor') {
                return redirect()->intended('advisor');
            }

            return redirect()->intended('/');
        }

        return redirect('login');

    }

    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return Redirect('login');
    }
}
