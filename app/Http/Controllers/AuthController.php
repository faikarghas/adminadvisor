<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;


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
                return redirect()->intended('/');
            } elseif ($user->level == 'advisor') {
                return redirect()->intended('fellows-assigned');
            }

            return redirect()->intended('/');
        }

        return redirect('login');

    }


    public function register(Request $request){
        $username = $request->get('username');
        $email = $request->get('email');
        $name = $request->get('name');
        $level = 'advisor';
        $password = bcrypt("adv$username@123!");
        $idAdvisor = $request->get('id');

        $data = [
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'level' => $level,
            'password' => $password,
            'idAdvisor' => "$idAdvisor"
        ];

        User::create($data);

        return response() ->json(['res' => $data]);
    }

    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return Redirect('login');
    }

    public function registerAdvisors(){
        $advisors = DB::table('advisor')->get();

        $data = [];
        set_time_limit(0);
        foreach ($advisors as $key => $value) {
            $pass = strtolower(implode(explode(' ',$value->full_name))).'#aimz'.rand(1,99).'!@';

            User::updateOrCreate(
            [
                'id_advisor' => $value->id_advisor
            ],
            [
                'name' => $value->full_name,
                'username' => 'advisor_'.''.strtolower(implode(explode(' ',$value->full_name))),
                'email' => $value->email_address,
                'level' => 'advisor',
                'password' => bcrypt($pass),
                'show_pass'=> $pass,
                'id_advisor' => $value->id_advisor
            ]);

        }

    }
}
