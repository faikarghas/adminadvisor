<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AppointmentModel;

class AppointmentController extends Controller
{

    public function __construct() { $this->middleware('preventBackHistory'); $this->middleware('auth'); } 

    public function index(){
        $content = DB::table('appointments')->get();


        $data = [
            'data' => $content
        ];

        return view('v_appointment',$data);
    }

    public function create(){
        return view('v_createAppointment');
    }

    public function postForm(Request $request){

        $request->validate([
            'service' => 'required',
            'advisor' => 'required',
            'date' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'cvLink' => 'required',
            'email'=> 'required',
            'phoneNumber' => 'required',
        ]);

        $data = [
            'service' => $request->input('service'),
            'advisor' => $request->input('advisor'),
            'date' => $request->input('date'),
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'cvLink' => $request->input('cvLink'),
            'email' => $request->input('email'),
            'status' => 0,
            'phoneNumber' => $request->input('phoneNumber'),
        ];

        AppointmentModel::create($data);

        return redirect()->route('appointment')->with('pesan','data berhasil ditambahkan');
    }
}
