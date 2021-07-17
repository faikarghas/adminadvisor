<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AppointmentModel;
use App\Models\FellowsListModel;
use App\Models\Advisor;

use Google\Client;
use Revolution\Google\Sheets\Facades\Sheets;
use Illuminate\Support\Facades\Auth;

class FellowsController extends Controller
{

    public function __construct() { $this->middleware('preventBackHistory'); $this->middleware('auth'); }

    // FELLOW
    public function index(Request $request){

        $listFellows = DB::table('fellows')->get();

        $listAdvisor = DB::table('advisor')
            ->join('appointment', 'advisor.id_advisor', '=', 'appointment.id_advisor')
            ->get();

        $listAdvisorAll = DB::table('advisor')->get();

        $appointmentSpdata = DB::table('advisor')
            ->join('appointment', 'advisor.id_advisor', '=', 'appointment.id_advisor')
            ->join('fellows', 'appointment.app_id', '=', 'fellows.app_id')
            ->get();

        $data = [
            'listFellows' => $listFellows,
            'listAdvisor'=> $listAdvisor,
            'listAdvisorAll' => $listAdvisorAll,
            'appointmentSpdata'=> $appointmentSpdata
        ];
        return view('v_fellows',$data);
    }

    public function summary(Request $request){

        $listFellows = DB::table('fellows')->get();

        $listAdvisor = DB::table('advisor')
            ->join('appointment', 'advisor.id_advisor', '=', 'appointment.id_advisor')
            ->get();

        $appointmentData = DB::table('advisor')
            ->join('appointment', 'advisor.id_advisor', '=', 'appointment.id_advisor')
            ->join('fellows', 'appointment.app_id', '=', 'fellows.app_id')
            ->get();

        $test = DB::table('advisor')
        ->join('appointment', 'advisor.id_advisor', '=', 'appointment.id_advisor')
        ->where('appointment.id_advisor',5)->sum('accepted');

        dd($test);

        $data = [
            'listFellows' => $listFellows,
            'listAdvisor'=> $listAdvisor,
            'appointmentData'=> $appointmentData
        ];
        return view('v_fellows_summary',$data);
    }

    public function updateData(Request $request){

        $rows = Sheets::spreadsheet('1pRXb2zPXms-o9BZsgZHZi3Z3ExX1ILx1doaMYjxHa1M')->sheet('Form Responses 1')->get();

        $header = $rows->pull(0);
        $values = Sheets::collection($header, $rows);
        $values->toArray();

        $data = collect();
        set_time_limit(0);
        foreach ($values as $key => $value) {
            FellowsListModel::updateOrCreate(
                [
                  'id'   => $key+1,
                ],
                [
                  'app_id' => $value['Application ID'],
                  'date' => $value['Application Time Stamp'],
                  'first_name' => $value['First name'],
                  'last_name' => $value['Last Name'],
                  'email_address' => $value['Email address'],
                  'phone' => $value['Phone number'],
                  'gender' => $value['Gender'],
                  'university' => $value['University'],
                  'gpa' => $value['GPA'],
                  'question_1' => $value['How did you know about AIMZ?'],
                  'question_2' => $value['Job hunting stage'],
                  'question_3' => $value['No. of past internships'],
                  'question_4' => $value['Experience in MNC/top company?'],
                  'question_5' => $value['Field of Interest (1st priority)'],
                  'question_6' => $value['Field of Interest (2nd priority)'],
                  'question_7' => $value['Primary target roles'],
                  'question_8' => $value['Salary expectation'],
                  'question_9' => $value['Timeline to start working'],
                  'reason_to_join' => utf8_encode($value['Reason to join AIMZ']),
                  'resume' => $value['CV link'],
                  'referee_name' => $value["Referee's name"],
                  'referee_wa' => $value["Referee's whatsapp number"],
                  'referee_email' => $value["Referee's email"],
                  'bootcamp_batch' => $value['Bootcamp Batch'],
                ]
            );
        }

        return redirect()->route('fellows')->with('pesan','data berhasil ditambahkan');
    }

    public function updateDataAdvisor(Request $request){

        $rows = Sheets::spreadsheet('1A_f9-y85NIhJFksHSTDJccVDd-uzkroFC005gjH8Nv0')->sheet('Pre-Bootcamp Setup')->get();

        $header = $rows->pull(0);
        $values = Sheets::collection($header, $rows);
        $values->toArray();
        // dd($values);

        $data = collect();
        set_time_limit(0);
        foreach ($values as $key => $value) {
            // echo $values[3]['Application ID'];
            Advisor::updateOrCreate(
                [
                  'id_advisor'   => $key,
                ],
                [
                  'full_name' => $value['Full Name'],
                  'first_name' => $value['First Name'],
                  'last_name' => $value['Last Name'],
                  'primary_stream' => $value['Primary Stream'],
                  'secondary_stream' => $value['Secondary Stream'],
                  'current_pod' => $value["Current Pod #"],
                  'class_size' => $value['Class Size'],
                  'last_position' => $value['Last Position'],
                  'last_company' => $value['Last Company'],
                  'email_address' => $value['Email address'],
                  'enrollment_key' => $value['Enrollment key'],
                  'calendly_link' => $value['Calendly link'],
                  'workshop_link' => $value['Workshop link'],
                  'workshop_schedule' => $value['Workshop schedule'],
                  'pod_connect_schedule' => $value['Tri-weekly pod connect schedule'],
                  'fee' => $value['Fee %'],
                  'advisor_type' => (int)str_replace(' ', '', $value['Advisor Type']),
                  'class' => $value['Class'],
                ]
            );
        }

        return redirect()->route('fellows')->with('pesan','data berhasil ditambahkan');
    }

    public function edit($app_id){

        $fellows = DB::table('fellows')->where('app_id',$app_id)->get();
        $appointment = DB::table('appointment')->where('app_id',$app_id)->get();
        $listAdvisor = DB::table('advisor')->get();

        $status;
        $selectedBatch;
        $selectedStrength;
        $selectedContract;
        $selectedAdvisor;
        $selectedStatus;

        if (count($appointment) == 0) {
            $status = 'create';
        } else {
            $status = 'edit';
        }

        if ($status == 'create') {
            $selectedBatch = '';
            $selectedStrength= '';
            $selectedContract ='';
            $selectedAdvisor='';
            $selectedStatus='';
        } else {
            $selectedBatch = $appointment[0]->bootcamp_batch;
            $selectedStrength = $appointment[0]->profile_strength;
            $selectedContract =  $appointment[0]->contract_signed;
            $selectedAdvisor = $appointment[0]->id_advisor;
            $selectedStatus= $appointment[0]->fellow_status;
        }

        $data = [
            'fellows' => $fellows,
            'selectedBatch' => $selectedBatch,
            'selectedStrength' => $selectedStrength,
            'listAdvisor' => $listAdvisor,
            'appointment' => $appointment,
            'selectedContract'=> $selectedContract,
            'selectedAdvisor' => $selectedAdvisor,
            'selectedStatus'=>$selectedStatus,
            'status'=> $status,
        ];

        return view('v_editFellow',$data);
    }

    public function postForm(Request $request,$app_id){

        $data = [
            'bootcamp_batch' => $request->input('batch'),
            'profile_strength' => $request->input('strength'),
            'id_advisor' => $request->input('advisor'),
            'aimz_remarks' => $request->input('remarks'),
            'internal_comments' => $request->input('comment'),
            'contract_signed' => $request->input('contract'),
            'fellow_status' => $request->input('status')
        ];

        AppointmentModel::updateOrCreate(
            [
              'app_id' => $app_id
            ],$data
        );


        return redirect()->route('fellows')->with('pesan','data berhasil ditambahkan');
    }

    // END FELLOW

    public function listAdvisor(Request $request){
        $rows = Sheets::spreadsheet('1pap4PbL2GcHgHt53cbzkW9q1eIV4eS96_hruu3D4lPs')->sheet('Form responses 1')->get();

        $header = $rows->pull(0);
        $values = Sheets::collection($header, $rows);
        $values->toArray();

        $content = DB::table('fellowss')->get();

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

    // FELLOW PROGRESS

    public function fellowsprogress(Request $request){

        $listFellows = DB::table('fellows')->get();
        $listAdvisor = DB::table('advisor')->get();
        $appointmentSpdata = DB::table('advisor')
        ->join('appointment', 'advisor.id_advisor', '=', 'appointment.id_advisor')
        ->get();


        $data = [
            'listFellows' => $listFellows,
            'appointmentSpdata' => $appointmentSpdata,
            'listAdvisor' => $listAdvisor
        ];


        return view('v_fellowsProgress',$data);
    }

    public function getDataFellowProgress($idAdvisor){
        $listAdvisorFellow = DB::table('advisor')
            ->join('appointment', 'advisor.idAdvisor', '=', 'appointment.idAdvisor')
            ->where('appointment.idAdvisor',$idAdvisor)
            ->get();


        return response()->json($listAdvisorFellow);
    }

    public function editFellowsProgress($app_id){

        $fellows = DB::table('fellows')->where('app_id',$app_id)->get();
        $appointment = DB::table('appointment')
        ->join('fellows', 'fellows.app_id', '=', 'appointment.app_id')
        ->where('fellows.app_id',$app_id)
        ->get();

        $status;
        $selectedStatus;
        $selectedPM;

        if (count($appointment) == 0) {
            $status = 'create';
        } else {
            $status = 'edit';
        }

        if ($status == 'create') {
            $selectedStatus='';
            $selectedPM='';
        } else {
            $selectedStatus= $appointment[0]->status;
            $selectedPM=$appointment[0]->payment_method;
        }

        $data = [
            'fellows' => $fellows,
            'appointment' => $appointment,
            'status' => $status,
            'selectedStatus' => $selectedStatus,
            'selectedPM' => $selectedPM,

        ];

        return view('v_editFellowProgress',$data);
    }

    public function postFellowsProgress(Request $request,$app_id){

        $data = [
            'status' => $request->input('status'),
            'invoice_amount' => $request->input('invoiceAmount'),
            'payment_method' => $request->input('payMethod'),
            'paid_amount' => $request->input('paidAmount'),
        ];

        DB::table('appointment')->updateOrInsert(
            [
              'app_id' => $app_id
            ],$data
        );

        return redirect()->route('fellows-progress')->with('pesan','data berhasil ditambahkan');
    }

    // END FELLOW PROGRESS

    // FELLOW ADVISOR
    public function fellowsAdvisor(Request $request){
        $users = DB::table('users')->get();

        $listAdvisor = DB::table('advisor')->get();


        $data = [
            'listAdvisor' => $listAdvisor,
            'users' => $users
        ];

        return view('v_fellowAdvisor',$data);
    }

    public function editFellowsAdvisor($id){
        $listAdvisor = DB::table('advisor')->where('id_advisor',$id)->get();
        $appointment = DB::table('appointment')->where('id_advisor',$id)->get();

        $status;

        if (count($appointment) == 0) {
            $status = 'create';
        } else {
            $status = 'edit';
        }

        if ($status == 'create') {
        } else {
        }


        $data = [
            'listAdvisor' => $listAdvisor,
            'idAdvisor' => $id,
            'status' =>  $status
        ];

        return view('v_editFellowAdvisor',$data);
    }

    public function postFellowsAdvisor(Request $request,$id){
        $data = [
            'first_name' => $request->input('advisor_first_name'),
            'last_name' => $request->input('advisor_last_name'),
            'full_name' => $request->input('advisor_full_name'),
            'current_pod' => $request->input('pod'),
            'class_size' => $request->input('class_size'),
            'primary_stream' => $request->input('primary_stream'),
            'secondary_stream' => $request->input('secondary_stream'),
            'last_position' => $request->input('last_position'),
            'last_company' => $request->input('last_company'),
            'enrollment_key' => $request->input('enrollment_key'),
            'calendly_link' => $request->input('calendly_link'),
            'workshop_link' => $request->input('workshop_link'),
            'workshop_schedule' => $request->input('workshop_schedule'),
            'pod_connect_schedule' => $request->input('pod_connect_schedule'),
            'advisor_type' => $request->input('advisor_type'),
            'class' => $request->input('class')
        ];

        DB::table('advisor')->where('id_advisor',$id)->update($data);

        return redirect()->route('fellowsAdvisor')->with('pesan','data berhasil ditambahkan');
    }
    // END FELLOW ADVISOR

    public function getFellowData(){
        $check = DB::table('fellows')->get();

        return response()->json($check);
    }

}
