<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class RegisterConfigController extends Controller
{
    public function chargeInfo(){
      
       $registerForm = DB::select('select * from register_form ');
       return response()->json(['data' => $registerForm], 200);
    }

    public function saveInfo(Request $request){

    }
}
