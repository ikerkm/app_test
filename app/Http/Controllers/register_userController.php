<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\user_acc;
use App\Http\Resources\User_register as User_registerResource;
use App\Http\Resources\User_registerCollection;
class register_userController extends Controller
{
    public function get_users(Request $request){
        $request -> validate([
            
            'email'=>'required',

        ]);
       $already_exist = user_acc::select('email')
       ->where('email', $request->get('email'))
       ->count();
 
   if ($already_exist){
    return response()->json(['exist' => false], 200);
   }else{
    return response()->json(['exist' => true,'email'=>$request-> get('email')], 200);
   }
     //  return response()->json(['exist' => $already_exist], 200);
    }


    public function save_user(Request $request){
        $request -> validate([
            'name' => 'required',
            'password'=> 'required',
            'email'=>'required',

        ]);
       
        $user_register = user_acc::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
       

        return response()->json(['status' => 'Register complete',"email" =>$request->get('email'), 'name' => $request->get('name'), ], 200);
    }
}
