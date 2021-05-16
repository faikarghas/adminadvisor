<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Revolution\Google\Sheets\Facades\Sheets;

class AdvisorController extends Controller
{
    public function __construct() { $this->middleware('preventBackHistory'); $this->middleware('auth'); }

    public function index(){

        $user = Auth::user();

        $content = DB::table('appointments')
        ->join('advisor', 'appointments.idAdvisor', '=', 'advisor.idAdvisor')
        ->where('appointments.idAdvisor',$user->idAdvisor)
        ->get();

        $rows = Sheets::spreadsheet('1kggTnIQa_FAGdIWRTX0Z3AEBWiQ8Ofg6SfSPim1aKf8')->sheet('Sheet1')->get();

        $header = $rows->pull(0);
        $values = Sheets::collection($header, $rows);
        $values->toArray();

        $data = [
            'data' => $content,
            'values'=> $values,
            'idAdvisor'=> $user->idAdvisor
        ];


        return view('v_advisor',$data);
    }

    public function approveForm(Request $request){

        $user = Auth::user();
        $range = $request->get('row');
        $upSheets = Sheets::spreadsheet('1kggTnIQa_FAGdIWRTX0Z3AEBWiQ8Ofg6SfSPim1aKf8')->sheet('Sheet1')->range($range)->update([['1']]);

        // $upSheets = Sheets::spreadsheet('1pap4PbL2GcHgHt53cbzkW9q1eIV4eS96_hruu3D4lPs')->sheet('Form responses 1')->range('B2')->update([['1110111']]);

        return response() ->json(['res' => 'oke']);
    }

    public function cancelForm(Request $request){

        $user = Auth::user();
        $range = $request->get('row');
        $upSheets = Sheets::spreadsheet('1kggTnIQa_FAGdIWRTX0Z3AEBWiQ8Ofg6SfSPim1aKf8')->sheet('Sheet1')->range($range)->update([['2']]);

        return response() ->json(['res' => 'oke']);
    }
}
