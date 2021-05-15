<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdvisorController extends Controller
{
    public function __construct() { $this->middleware('preventBackHistory'); $this->middleware('auth'); }

    public function index(){

        $user = Auth::user();

        $content = DB::table('appointments')
        ->join('advisor', 'appointments.idAdvisor', '=', 'advisor.idAdvisor')
        ->where('appointments.idAdvisor',$user->idAdvisor)
        ->get();

        $data = [
            'data' => $content
        ];

        return view('v_advisor',$data);

    }
}
