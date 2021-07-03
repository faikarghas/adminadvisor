<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Revolution\Google\Sheets\Facades\Sheets;

class AdvisorController extends Controller
{
    public function __construct() { $this->middleware('preventBackHistory'); $this->middleware('auth'); }

    // FELLOW ASSIGNED
    public function index(){

        $user = Auth::user();

        // data mysql
        $content = DB::table('appointment')->where('idAdvisor',$user->idAdvisor)->get();

        $idAdvisorList=[];

        foreach ($content as $key => $value) {
            array_push($idAdvisorList,$value->idAdvisor);
        }

        // data google sheet
        $rows = Sheets::spreadsheet('1qyG4Vvjq1cRB8xilpa7ymsbvOTbGEKehMtVffEXIK-M')->sheet('Form Responses 1')->get();
        $header = $rows->pull(0);
        $values = Sheets::collection($header, $rows);
        $values->toArray();

        // dd($content);

        $data = [
            'dataAppointment' => $content,
            'listFellow'=> $values,
            'idAdvisor'=> $user->idAdvisor,
            'idAdvisorList'=> $idAdvisorList
        ];


        return view('v_advisor',$data);
    }

    public function edit($email){
        $rows = Sheets::spreadsheet('1qyG4Vvjq1cRB8xilpa7ymsbvOTbGEKehMtVffEXIK-M')->sheet('Form responses 1')->get();

        $header = $rows->pull(0);
        $listMentee = Sheets::collection($header, $rows);
        $listMentee->toArray();

        $listAdvisor = DB::table('advisor')->get();
        $appointmentSpdata = DB::table('appointment')->where('fellowEmail',$email)->get();

        $check = DB::table('appointment')->where('fellowEmail',$email)->get();

        $appointmentSpdata = $appointmentSpdata[0];
        $selectedAssign = $appointmentSpdata->accept;
        $data = [
            'listAdvisor' => $listAdvisor,
            'email' => $email,
            'appointmentSpdata'=> $appointmentSpdata,
            'selectedAssign' => $selectedAssign,
        ];

        return view('v_editFellowAssigned',$data);
    }

    public function postFellowsAssigned(Request $request,$email){
        $data = [
            'accept' => $request->input('accept'),
            'reason' => $request->input('reason'),
            'advisorRemarks' => $request->input('advisorRemarks'),
            'comment' => $request->input('comment'),
        ];

        DB::table('appointment')->where('fellowEmail',$email)->update($data);

        return redirect()->route('fellows-assigned')->with('pesan','data berhasil ditambahkan');
    }
    // END FELLOW ASSIGNED

    //FELLOW PROFRESS
    public function fellowsProgressAdvisor(){
        $user = Auth::user();

        $content = DB::table('appointment')->where('idAdvisor',$user->idAdvisor)->where('accept','=',2)->orWhere('accept','=',1)->get();

        $data = [
            'dataAppointment' => $content,
            'idAdvisor'=> $user->idAdvisor,
        ];


        return view('v_fellowProgressAdvisor',$data);
    }

    public function editFellowsProgressAdvisor(Request $request,$email){
        $listAdvisor = DB::table('advisor')->get();
        $appointmentSpdata = DB::table('appointment')->where('fellowEmail',$email)->get();

        $check = DB::table('appointment')->where('fellowEmail',$email)->get();

        $appointmentSpdata = $appointmentSpdata[0];

        $data = [
            'listAdvisor' => $listAdvisor,
            'email' => $email,
            'appointmentSpdata'=> $appointmentSpdata,
            'selectedCv' => $appointmentSpdata->cvFinalized,
            'selectedScheduled' => $appointmentSpdata->scheduled,
            'selectedScheduled' => $appointmentSpdata->scheduled,
            'selectedStatus' => $appointmentSpdata->status,

        ];

        return view('v_editFellowProgressAdvisor',$data);
    }

    public function postFellowsProgressAdvisor(Request $request,$email){
        $data = [
            'cvFinalized' => $request->input('cv'),
            'scheduled' => $request->input('scheduled'),
            'status' => $request->input('status'),
            'remarks' => $request->input('remarks'),
            'employer' => $request->input('employer'),
            'employedDate' => $request->input('date'),
        ];

        DB::table('appointment')->where('fellowEmail',$email)->update($data);

        return redirect()->route('fellowsProgressAdvisor')->with('pesan','data berhasil ditambahkan');
    }
    //END FELLOW PROFRESS

    //WEEKLY FEEDBACK
    public function weeklyFeedback(Request $request){
        $user = Auth::user();
        $nameCheck = $user->name;
        $exp = explode(' ', $nameCheck);
        $jn = strtolower(join(" ",$exp));

        $rows = Sheets::spreadsheet('1QzB3gnUy0wQqO320ZwD8k4hiysPBaxI2Pb7VAmdeU14')->sheet('Summary')->get();

        $header = $rows->pull(2);
        $values = Sheets::collection($header, $rows);
        $values->toArray();


        $rows2 = Sheets::spreadsheet('1QzB3gnUy0wQqO320ZwD8k4hiysPBaxI2Pb7VAmdeU14')->sheet(ucwords($exp[0]))->get();

        $header2 = $rows2->pull(2);
        $values2 = Sheets::collection($header2, $rows2);
        $values2->toArray();

        $activeFellow = DB::table('appointment')->where('idAdvisor',$user->idAdvisor)->where('accept','=',2)->orWhere('accept','=',1)->get();

        $data = [
            'bootcampData' => $values,
            'bootcampExp' => $values2,
            'name' => $jn,
            'activeFellow'=> $activeFellow
        ];

        return view('v_weekly-feedback',$data);
    }
    //END WEEKLY FEEDBACK


    public function approveForm(Request $request){

        $user = Auth::user();
        $idApp = $request->get('id');

        $affected = DB::table('appointments')
              ->where('id', $idApp)
              ->update(['accept' => 1]);

        return response() ->json(['res' => 'oke']);
    }

    public function cancelForm(Request $request){

        $user = Auth::user();
        $idApp = $request->get('id');

        $affected = DB::table('appointments')
              ->where('id', $idApp)
              ->update(['status' => 2]);

        return response() ->json(['res' => 'oke']);
    }
}
