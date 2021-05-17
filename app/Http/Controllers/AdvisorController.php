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

        // data mysql
        $content = DB::table('appointments')->get();

        $idAdvisorList=[];

        foreach ($content as $key => $value) {
            array_push($idAdvisorList,$value->idAdvisor);
        }

        // data google sheet
        $rows = Sheets::spreadsheet('1kggTnIQa_FAGdIWRTX0Z3AEBWiQ8Ofg6SfSPim1aKf8')->sheet('Sheet1')->get();
        $header = $rows->pull(0);
        $values = Sheets::collection($header, $rows);
        $values->toArray();


        $data = [
            'data' => $content,
            'values'=> $values,
            'idAdvisor'=> $user->idAdvisor,
            'idAdvisorList'=> $idAdvisorList
        ];


        return view('v_advisor',$data);
    }

    public function approveForm(Request $request){

        $user = Auth::user();
        $idApp = $request->get('id');

        $affected = DB::table('appointments')
              ->where('id', $idApp)
              ->update(['status' => 1]);

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
