<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AppointmentModel;
use Google\Client;
use Revolution\Google\Sheets\Facades\Sheets;
use Illuminate\Support\Facades\Auth;

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
        $rows = Sheets::spreadsheet('1SZgn2fx3d_AIBfUodg7PNZVAhcMcSMl4iYJFWz75lL0')->sheet('Form responses 1')->get();

        $header = $rows->pull(0);
        $listMentee = Sheets::collection($header, $rows);
        $listMentee->toArray();

        $listAdvisor = DB::table('users')->where('level','advisor')->get();


        $data = [
            'listAdvisor' => $listAdvisor,
            'listMentee' => $listMentee
        ];

        return view('v_createAppointment',$data);
    }

    public function postForm(Request $request){

        $request->validate([
            'service' => 'required',
            'advisor' => 'required',
            'mentee' => 'required',
            'date' => 'required',
        ]);
        $cv = explode(',',$request->input('mentee'));
        $idAdvisor = explode(',',$request->input('advisor'));

        $data = [
            'idAdvisor' => $idAdvisor[1],
            'service' => $request->input('service'),
            'advisor_name' => $request->input('advisor'),
            'mentee_name' => $request->input('mentee'),
            'date' => $request->input('date'),
            'status' => 0,
            'cvLink' => $cv[1],
        ];

        // dd($data);

        AppointmentModel::create($data);
        return redirect()->route('appointment')->with('pesan','data berhasil ditambahkan');
    }

    public function listAdvisor(Request $request){
        $rows = Sheets::spreadsheet('1pap4PbL2GcHgHt53cbzkW9q1eIV4eS96_hruu3D4lPs')->sheet('Form responses 1')->get();

        $header = $rows->pull(0);
        $values = Sheets::collection($header, $rows);
        $values->toArray();

        $content = DB::table('appointments')->get();

        $user = DB::table('users')->where('level','advisor')->get();

        $emailList=[];

        foreach ($user as $key => $value) {
            array_push($emailList,$value->email);
        }

        $data = [
            'listAdvisor'=> $values,
            'user'=> $user,
            'emailList'=> $emailList
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
