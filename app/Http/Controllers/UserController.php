<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User,Career};

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(\Auth::user()->is_admin()){true;}else{return back();}
    	$users = User::all();

    	return view('admin.alluser',compact('users'));
    }

    public function store(Request $request)
    {
        if(\Auth::user()->is_admin()){true;}else{return back();}
    	$user = User::create([
            'name' => $request->uname,
            'email' => $request->uemail,
            'password' => \Hash::make($request->password),
        ]);

        $user->roles()->attach(2);

        return back();
    }

    public function edit(Request $request,$id)
    {
        if(\Auth::user()->is_admin()){true;}else{return back();}
    	$user = User::findOrFail($id);
    	if($request->ajax()){
            return response()->json($user,200);
        }else{
            $user->update($request->all());
            return back();
        }
    }

    public function destroy($id)
    {
        if(\Auth::user()->is_admin()){true;}else{return back();}
    	$user = User::findOrFail($id);
    	$user->delete();

    	return back();
    }

    public function statisticsAll()
    {
        $careers = Career::all();

        return view('admin.statistics',compact('careers'));
    }
}
