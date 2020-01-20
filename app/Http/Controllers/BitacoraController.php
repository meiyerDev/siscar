<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Binnacle};

class BitacoraController extends Controller
{
    public function index()
    {
        if(\Auth::user()->is_admin()){true;}else{return back();}
    	$binnacles = Binnacle::all();

    	return view('admin.binnacle',compact('binnacles'));
    }
}
