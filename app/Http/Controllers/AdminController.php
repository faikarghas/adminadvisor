<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Client;
use Revolution\Google\Sheets\Facades\Sheets;

class AdminController extends Controller
{
    public function __construct() { $this->middleware('preventBackHistory'); $this->middleware('auth'); }

    public function index(){
        return view('v_home');
    }

    public function googlesheet(Request $request){
        $user = $request->user();

        $token = [
            'access_token'  => $user->access_token,
            'refresh_token' => $user->refresh_token,
            'expires_in'    => $user->expires_in,
            'created'       => $user->updated_at->getTimestamp(),
        ];
        $values = Sheets::spreadsheet('1kggTnIQa_FAGdIWRTX0Z3AEBWiQ8Ofg6SfSPim1aKf8')->sheet('Sheet1')->all();

        Sheets::sheet('Sheet1')->append([['name' => 'name4', 'mail' => 'mail4', 'id' => 4]]);
        $values2 = Sheets::all();

    }
}
