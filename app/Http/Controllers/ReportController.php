<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Career,Student};

class ReportController extends Controller
{
    public function index()
    {
    	$careers = Career::all();

    	return view('admin.report', compact('careers'));
    }

    public function download(Request $request)
    {
		$type_report = $request->type_report;

		if ($type_report < 2) {
        
            $students = Student::all();
            $pdf = \PDF::loadView('admin.reports.index', compact('students','type_report'));
		
        }elseif($type_report < 3){
    	
        	$career = Career::all();
            $pdf = \PDF::loadView('admin.reports.index',compact('career','type_report'));
		
        }elseif($type_report < 4){
    	
        	$career = Career::where('code',$request->career_id)->first();
            $pdf = \PDF::loadView('admin.reports.index',compact('career','type_report'));
        
        }elseif($type_report < 5){
    
            $career = Career::all();
            $pdf = \PDF::loadView('admin.reports.index',compact('career','type_report'));

        }elseif($type_report < 6){

            $career = Career::where('code',$request->career_id)->first();
            $pdf = \PDF::loadView('admin.reports.index',compact('career','type_report'));

        }elseif($type_report < 7){
            $career = Career::all();
            $pdf = \PDF::loadView('admin.reports.index',compact('career','type_report'));
        }


        return $pdf->download();
    }
}
