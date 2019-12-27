<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Userpic;

class ProfileController extends Controller
{
    //
    public function show(){
      //get items and item images and list image
        $user=Auth::user();
        $userpic=Userpic::where('user_id',$user->id)->get();
        //view
        return view('pages.profile', ['pic'=>$userpic,'name'=>$user->name,'email'=>$user->email]);
    }
    public function edit(Request $request){
      $action = $request->edit;
      $user=Auth::user();
    switch ($action) {
        case 'name':
            $user->name=$request->newvalue;
            break;
        case 'email':
            $user->email=$request->newvalue;
            break;
    }
    $user->save();
    return response()->json(['success'=>"yes"]);
    }
}
