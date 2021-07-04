<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FellowsModel;
use Google\Client;
use Revolution\Google\Sheets\Facades\Sheets;
use Illuminate\Support\Facades\Auth;

class FellowsController extends Controller
{

    public function __construct() { $this->middleware('preventBackHistory'); $this->middleware('auth'); }

    // FELLOW
    public function index(Request $request){

        $rows = Sheets::spreadsheet('1qyG4Vvjq1cRB8xilpa7ymsbvOTbGEKehMtVffEXIK-M')->sheet('Form Responses 1')->get();

        $header = $rows->pull(0);
        $values = Sheets::collection($header, $rows);
        $values->toArray();

        $listAdvisor = DB::table('advisor')
            ->join('appointment', 'advisor.idAdvisor', '=', 'appointment.idAdvisor')
            ->get();

        $appointmentSpdata = DB::table('advisor')
            ->join('appointment', 'advisor.idAdvisor', '=', 'appointment.idAdvisor')
            ->get();


        $data = [
            'data' => $values,
            'listAdvisor'=> $listAdvisor,
            'appointmentSpdata'=> $appointmentSpdata
        ];

        return view('v_fellows',$data);
    }

    public function edit($email){
        $rows = Sheets::spreadsheet('1qyG4Vvjq1cRB8xilpa7ymsbvOTbGEKehMtVffEXIK-M')->sheet('Form responses 1')->get();

        $header = $rows->pull(0);
        $listMentee = Sheets::collection($header, $rows);
        $listMentee->toArray();

        $listAdvisor = DB::table('advisor')->get();
        $appointmentSpdata = DB::table('appointment')->where('fellowEmail',$email)->get();

        $check = DB::table('appointment')->where('fellowEmail',$email)->get();
        $status;
        $selectedAdvisor;
        $selectedStrength;

        if (count($check) == 0) {
            $status = 'create';
        } else {
            $status = 'edit';
        }

        if ($status == 'create') {
            $appointmentSpdata = '';
            $selectedAdvisor = '';
            $selectedStrength = '';
        } else {
            $appointmentSpdata = $appointmentSpdata[0];
            $selectedAdvisor = $appointmentSpdata->idAdvisor;
            $selectedStrength = $appointmentSpdata->strength;
        }


        $data = [
            'listAdvisor' => $listAdvisor,
            'email' => $email,
            'appointmentSpdata'=> $appointmentSpdata,
            'status'=> $status,
            'selectedAdvisor' => $selectedAdvisor,
            'selectedStrength' => $selectedStrength
        ];

        return view('v_editFellow',$data);
    }

    public function postForm(Request $request){

        $request->validate([
            'batch' => 'required',
            'advisor' => 'required',
            'strength' => 'required',
            'contract' => 'required',
            'remarks' => 'required',
        ]);

        $data = [
            'batch' => $request->input('batch'),
            'idAdvisor' => $request->input('advisor'),
            'strength' => $request->input('strength'),
            'adminRemarks' => $request->input('remarks'),
            'contract' => $request->input('contract'),
            'fellowEmail' => $request->input('fellowEmail')
        ];

        if($request->input('status') == 'edit'){
            DB::table('appointment')->where('fellowEmail',$request->input('fellowEmail'))->update($data);
        } else {
            FellowsModel::create($data);
        }


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

        $rows = Sheets::spreadsheet('1qyG4Vvjq1cRB8xilpa7ymsbvOTbGEKehMtVffEXIK-M')->sheet('Form Responses 1')->get();

        $header = $rows->pull(0);
        $values = Sheets::collection($header, $rows);
        $values->toArray();

        $listAdvisor = DB::table('advisor')->get();

        // $appointmentSpdata = DB::table('appointment')->get();

        $appointmentSpdata = DB::table('advisor')
            ->join('appointment', 'advisor.idAdvisor', '=', 'appointment.idAdvisor')
            ->get();

        $data = [
            'data' => $values,
            'listAdvisor'=> $listAdvisor,
            'appointmentSpdata'=> $appointmentSpdata
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

    public function editFellowsProgress($email){
        $rows = Sheets::spreadsheet('1qyG4Vvjq1cRB8xilpa7ymsbvOTbGEKehMtVffEXIK-M')->sheet('Form responses 1')->get();

        $header = $rows->pull(0);
        $listMentee = Sheets::collection($header, $rows);
        $listMentee->toArray();

        $listAdvisor = DB::table('advisor')->get();
        $appointmentSpdata = DB::table('appointment')->where('fellowEmail',$email)->get();

        $check = DB::table('appointment')->where('fellowEmail',$email)->get();

        $appointmentSpdata = $appointmentSpdata[0];
        $selectedInvoice = $appointmentSpdata->invoice;
        $selectedInvoiceAmount = $appointmentSpdata->invoiceAmount;

        $data = [
            'listAdvisor' => $listAdvisor,
            'email' => $email,
            'appointmentSpdata'=> $appointmentSpdata,
            'selectedInvoice' => $selectedInvoice,
            'selectedInvoiceAmount' => $selectedInvoiceAmount
        ];

        return view('v_editFellowProgress',$data);
    }

    public function postFellowsProgress(Request $request){

        $request->validate([
            // 'invoice' => 'required',
            // 'invoiceAmount' => 'required'
        ]);

        $data = [
            'invoice' => $request->input('invoice'),
            'invoiceAmount' => $request->input('invoiceAmount'),
        ];

        DB::table('appointment')->where('fellowEmail',$request->input('fellowEmail'))->update($data);

        return redirect()->route('fellows-progress')->with('pesan','data berhasil ditambahkan');
    }

    // END FELLOW PROGRESS

    // FELLOW ADVISOR
    public function fellowsAdvisor(Request $request){
        $listAdvisor = DB::table('advisor')->get();

        $data = [
            'listAdvisor'=> $listAdvisor
        ];

        return view('v_fellowAdvisor',$data);
    }

    public function bootcampHistory($name){
        $user = Auth::user();

        $nameCheck = $name;
        $exp = explode('-', $nameCheck);
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

        return view('v_bootcampHistory',$data);
    }

    public function editFellowsAdvisor($id){
        $listAdvisor = DB::table('advisor')->where('idAdvisor',$id)->get();

        $data = [
            'listAdvisor' => $listAdvisor,
            'idAdvisor' => $id
        ];

        return view('v_editFellowAdvisor',$data);
    }

    public function postFellowsAdvisor(Request $request,$id){
        $data = [
            'classSize' => $request->input('class'),
            'industry' => $request->input('industry'),
            'level' => $request->input('level'),
            'feeSplit' => $request->input('fee'),
        ];

        DB::table('advisor')->where('idAdvisor',$id)->update($data);

        return redirect()->route('fellowsAdvisor')->with('pesan','data berhasil ditambahkan');
    }
    // END FELLOW ADVISOR

}
