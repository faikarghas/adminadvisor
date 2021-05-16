<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AppointmentModel;
use Google\Client;
use Revolution\Google\Sheets\Facades\Sheets;

class AppointmentController extends Controller
{

    public function __construct() { $this->middleware('preventBackHistory'); $this->middleware('auth'); } 

    public function index(Request $request){

        $content = DB::table('appointments')->get();

        $data = [
            'data' => $content,
            // 'values'=> $values
        ];

        return view('v_appointment',$data);
    }

    public function create(){

        $rows = Sheets::spreadsheet('1pap4PbL2GcHgHt53cbzkW9q1eIV4eS96_hruu3D4lPs')->sheet('Form responses 1')->get();

        $header = $rows->pull(0);
        $values = Sheets::collection($header, $rows);
        $values->toArray();

        $rows2 = Sheets::spreadsheet('1SZgn2fx3d_AIBfUodg7PNZVAhcMcSMl4iYJFWz75lL0')->sheet('Form responses 1')->get();

        $header2 = $rows2->pull(0);
        $values2 = Sheets::collection($header2, $rows2);
        $values2->toArray();

        $data = [
            'listAdvisor' => $values,
            'listMentee' => $values2
        ];

        return view('v_createAppointment',$data);
    }

    public function postForm(Request $request){

        $request->validate([
            'service' => 'required',
            'advisor' => 'required',
            'mentee' => 'required',
            'date' => 'required',
            'cvLink' => 'required',
            'email'=> 'required',
            'phoneNumber' => 'required',
        ]);

        $data = [
            'service' => $request->input('service'),
            'advisor_name' => $request->input('advisor'),
            'mentee_name' => $request->input('advisor'),
            'date' => $request->input('date'),
            'cvLink' => $request->input('cvLink'),
            'email' => $request->input('email'),
            'status' => 0,
            'phoneNumber' => $request->input('phoneNumber'),
        ];

        AppointmentModel::create($data);

        return redirect()->route('appointment')->with('pesan','data berhasil ditambahkan');
    }

    public function listAdvisor(Request $request){
        $rows = Sheets::spreadsheet('1pap4PbL2GcHgHt53cbzkW9q1eIV4eS96_hruu3D4lPs')->sheet('Form responses 1')->get();

        $header = $rows->pull(0);
        $values = Sheets::collection($header, $rows);
        $values->toArray();

        $data = [
            'listAdvisor'=> $values
        ];

        return view('v_listAdvisor',$data);
    }

    public function listMentee(Request $request){
        $rows = Sheets::spreadsheet('1SZgn2fx3d_AIBfUodg7PNZVAhcMcSMl4iYJFWz75lL0')->sheet('Form responses 1')->get();

        $header = $rows->pull(0);
        $values = Sheets::collection($header, $rows);
        $values->toArray();

        $data = [
            'listAdvisor'=> $values
        ];

        return view('v_listMentee',$data);
    }
}
