<?php

namespace App\Http\Controllers;
use App\User_acc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class userCheckerController extends Controller
{
    public function check(Request $request){


        $validate_user =User_acc::select('*')
        ->where('id', $request -> get('userId'))
        ->first();
        if (Hash::check($request->get('token'), $validate_user -> token)) {
           
            return response()->json(['token' => "token verification is ok!",'name' => $validate_user -> name, 'email'=> $validate_user -> email], 200);
         // echo "algo";
        }else{
            echo "wrong credentials";
        }


    }
}
