<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Revolution\Google\Sheets\Facades\Sheets;
use App\Models\AppointmentModel;
use App\Models\FellowsListModel;

class AdvisorController extends Controller
{
    public function __construct() { $this->middleware('preventBackHistory'); $this->middleware('auth'); }

    // FELLOW ASSIGNED
    public function index(){

        $user = Auth::user();

        $signedFellow = DB::table('appointment')->where('id_advisor',$user->id_advisor)->get();
        $listFellows = DB::table('fellows')->get();

        $appointmentData = DB::table('advisor')
        ->join('appointment', 'advisor.id_advisor', '=', 'appointment.id_advisor')
        ->join('fellows', 'appointment.app_id', '=', 'fellows.app_id')
        ->where('appointment.id_advisor',$user->id_advisor)
        ->select('*','advisor.email_address as advisor_email')
        ->get();

        $listFellows = DB::table('fellows')->where('id_advisor',$user->id_advisor)->get();

        $data = [
            'dataSignedFellow' => $signedFellow,
            'listFellows' => $listFellows,
            'id_advisor' => $user->id_advisor,
            'appointmentData' => $appointmentData
        ];


        return view('v_fellowAssigned',$data);
    }

    public function getFellowAssignedSummary(Request $request){
        $user = Auth::user();

        $getData = $request->all();
        $accept = $getData['accept'];
        $batch = $getData['batch'];

        if ($batch == null) {
            $data =  DB::select("
                SELECT
                advisor.full_name as 'AdvisorName',
                COUNT(IF(accepted = 0, 1, NULL)) as 'Blank',
                COUNT(IF(accepted = 1, 1, NULL)) as 'Accepted',
                COUNT(IF(accepted = 2, 1, NULL)) as 'Waitlisted',
                COUNT(IF(accepted = 3, 1, NULL)) as 'Rejected'
                FROM `fellows`
                RIGHT JOIN
                advisor ON
                fellows.id_advisor = advisor.id_advisor
                where fellows.id_advisor = $user->id_advisor
                GROUP BY advisor.full_name
            ");
        } else {
            $data =  DB::select("
                SELECT
                advisor.full_name as 'AdvisorName',
                COUNT(IF(accepted = 0, 1, NULL)) as 'Blank',
                COUNT(IF(accepted = 1, 1, NULL)) as 'Accepted',
                COUNT(IF(accepted = 2, 1, NULL)) as 'Waitlisted',
                COUNT(IF(accepted = 3, 1, NULL)) as 'Rejected',
                bootcamp_batch
                FROM `fellows`
                RIGHT JOIN
                advisor ON
                fellows.id_advisor = advisor.id_advisor
                where fellows.id_advisor = $user->id_advisor AND
                fellows.bootcamp_batch = '$batch'
                GROUP BY advisor.full_name, fellows.bootcamp_batch
            ");
        }

        return response()->json([
            'respond' => 'success',
            'data' => $data
        ]);
    }

    public function filterSummary(Request $request){


        return response()->json([
            'respond' => 'success'
        ]);
    }

    public function edit($app_id){
        $listAdvisor = DB::table('advisor')->get();
        $appointment = DB::table('appointment')->where('app_id',$app_id)->get();
        $fellows = DB::table('fellows')->where('app_id',$app_id)->get();


        $data = [
            'listAdvisor' => $listAdvisor,
            'appointment'=> $appointment,
            'fellows' => $fellows
        ];

        return view('v_editFellowAssigned',$data);
    }

    public function postFellowsAssigned(Request $request,$app_id){
        $data = [
            'advisor_remarks' => $request->input('advisorRemarks'),
            'accepted' => $request->input('accept'),
            'reason_for_rejection' => $request->input('reason_for_rejection'),
        ];


        FellowsListModel::updateOrCreate(
            [
              'app_id' => $app_id
            ], $data
        );

        return redirect()->route('fellows-assigned')->with('pesan','data berhasil ditambahkan');
    }

    public function signedFellows(){

        $user = Auth::user();

        $appointmentData = DB::table('fellows')
        ->join('appointment', 'appointment.app_id', '=', 'fellows.app_id')
        ->where(['fellows.id_advisor'=>$user->id_advisor,'fellows.accepted'=>'1','fellows.contract_signed'=>1])
        ->get();

        $data = [
            'appointmentData' => $appointmentData
        ];


        return view('v_signedFellow',$data);
    }
    // END FELLOW ASSIGNED

    //FELLOW PROFRESS
    public function fellowsProgressAdvisor(){
        $user = Auth::user();

        $listFellows = DB::table('fellows')->get();
        $listAdvisor = DB::table('advisor')->get();
        $appointmentData = DB::table('advisor')
        ->join('appointment', 'advisor.id_advisor', '=', 'appointment.id_advisor')
        ->join('fellows', 'appointment.app_id', '=', 'fellows.app_id')
        ->where(['appointment.id_advisor'=>$user->id_advisor,'accepted'=>'1','contract_signed'=>'1'])
        ->get();

        $data = [
            'listFellows' => $listFellows,
            'appointmentData' => $appointmentData,
            'listAdvisor' => $listAdvisor
        ];

        return view('v_fellowProgressAdvisor',$data);
    }

    public function editFellowsProgressAdvisor(Request $request,$app_id){
        $user = Auth::user();

        $appointment = DB::table('advisor')
        ->join('appointment', 'advisor.id_advisor', '=', 'appointment.id_advisor')
        ->join('fellows', 'appointment.app_id', '=', 'fellows.app_id')
        ->where(['appointment.id_advisor'=>$user->id_advisor,'appointment.app_id'=>$app_id])
        ->get();

        $status;
        $selectedAccept;

        if (count($appointment) == 0) {
            $status = 'create';
        } else {
            $status = 'edit';
        }

        if ($status == 'create') {
            $selectedAccept = '';
        } else {
            $selectedAccept = $appointment[0]->accepted;
        }


        $data = [
            'appointment' => $appointment,
            'status' => $status
        ];

        return view('v_editFellowProgressAdvisor',$data);
    }

    public function postFellowsProgressAdvisor(Request $request,$app_id){
        $data = [
            'cv_finalized' => $request->input('cv_finalized'),
            'response_board_finalized' => $request->input('response_board_finalized'),
            'ongoing_applications' => $request->input('ongoing_applications'),
            'upcoming_applications' => $request->input('upcoming_applications'),
            'target_companies' => $request->input('target_companies'),
            'comments' => $request->input('comments'),
            'status' => $request->input('status'),
            'employer' => $request->input('employer'),
            'employed_date' => $request->input('employed_date')
        ];

        DB::table('appointment')->where('app_id',$app_id)->update($data);

        return redirect()->route('fellowsProgressAdvisor')->with('pesan','data berhasil ditambahkan');
    }
    //END FELLOW PROFRESS

    //DATA ADVISOR
    public function data(){
        $user = Auth::user();

        $listAdvisor = DB::table('advisor')->where('id_advisor',$user->id_advisor)->get();

        $data = [
            'listAdvisor' =>  $listAdvisor
        ];

        return view('advisor/v_dataAdvisor',$data);
    }

    public function postDataAdvisor(Request $request,$id){
        $data = [
            'first_name' => $request->input('advisor_first_name'),
            'last_name' => $request->input('advisor_last_name'),
            'full_name' => $request->input('advisor_full_name'),
            'email_address' => $request->input('email_address'),
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

        return redirect()->route('data')->with('pesan','data berhasil ditambahkan');
    }
    //END DATA ADVISOR

    // BULK EDIT
    public function bulkBatch(Request $request){

        $data = $request->all();

        $list_id = explode(',',$request->input('list_id'));

        $name1 = $request->input('acceptedBulk') ? 'accepted' : '';
        $val1 = $request->input('acceptedBulk') ? $request->input('acceptedBulk') : '';

        foreach ($list_id as $key => $value) {
            FellowsListModel::updateOrCreate(
                [
                    'app_id'   => $value,
                ],
                [
                    $name1 => $val1,
                ]
            );
        }


        return redirect()->route('fellows-assigned')->with('pesan','data berhasil ditambahkan');
    }

}
