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

        return new User_registerResource(user_acc::findOrFail($request->all()));

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
        return (new User_registerResource($user_register))
        ->response()
        ->setStatusCode(201);


    }
}
