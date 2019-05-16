<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User_acc;
use App\Http\Resources\User_login as User_loginResource;
use Illuminate\Support\Facades\Auth;

class User_loginController extends Controller
{
   public function login_user (Request $request){
    $validate_user = new User_loginResource( User_acc::select('*')
    ->where('email', $request -> get('email'))
    ->first());
    if (Hash::check($request->get('password'), $validate_user -> password)) {
        $token = $validate_user -> createToken('TutsForWeb')->accessToken;
       User_acc::where('email', $request->get('email'))
          ->update(['token' => Hash::make($token)]);
       // return response()->json(['token' => $token], 200);
       echo "algo";
    }else{
        echo "wrong credentials";
    }
   }
}
