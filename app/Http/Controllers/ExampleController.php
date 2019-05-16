<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Example;
use App\Http\Resources\Example as ExampleResource;
use App\Http\Resources\ExampleCollection;

class ExampleController extends Controller
{
   
public function index(){
    return new ExampleCollection(Example::all());
}

public function show($id){
return new ExampleResource(Example::findOrFail($id));

}

public function store(Request $request){
    $request -> validate([
        'name' => 'required|max:255',
    ]);
    $example = Example::create($request->all());
    return (new ExampleResource($example))
    ->response()
    ->setStatusCode(201);


}

public function delete($id){
    $example = Example::findOrFail($id);
    $example->delete();
    return response()->json(null,204);

}

public function login(Request $request){
 

    
}








}
