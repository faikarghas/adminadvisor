<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct() { $this->middleware('preventBackHistory'); $this->middleware('auth'); } 

    public function index(){
        return view('v_home');
    }
}
