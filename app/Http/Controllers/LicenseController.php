<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\{Student,Career};
use App\{Binnacle,Licenses};
use App\Mail\LicenseCallReceived;
use QrCode;

class LicenseController extends Controller
{
    // METODO PARA ENVIAR EL CARNET
    public function sendLicense(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'identity'  =>  'required',
        ])->validate();

        $student = Student::where('identity',$request->identity)->first();
        $url = str_replace('send/license', 'estudiante/search/'.$request->identity, $request->url());

        $pdf = \PDF::loadView('student.pdfLicense', compact('student','url'));

        $receiver = $student->email;

        // return $student;

        \Mail::to($receiver)->send(new LicenseCallReceived($request->student,$pdf));
        
        $binnacle = Binnacle::create([
            'type' => 2,
            'action' => 'Solicitud de Carnet',
            'identity' => $request->identity,
        ]);

        licenses::create([
            'student_id' => $student->id,
            'career_id' => $student->careers->last()->id
        ]);

        return response('¡Enviado!', $status = 200);        
    }
    // METODO PARA ENVIAR EL CARNET

    // METODO PARA SOLICITAR EL CARNET
    public function soliStudent(Request $request)
    {
        return view('student.licenses');
    }
    // METODO PARA SOLICITAR EL CARNET

    // METODO PARA BUSCAR EL ESTUDIANTE
    public function searchStudent($id)
    {
        $student_sql = Student::/*select(['first_name','last_name','identity'])->*/where('identity',$id)->first();
       
        if(is_null($student_sql)){
            return 'Lo sentimos, Este registro no existe.';
        }
       
        $student = [
            'Nombres' => $student_sql->first_name,
            'Apellido' => $student_sql->last_name,
            'Cédula' => $student_sql->identity
        ];

        $career_sql = $student_sql->careers()->get();
        $careers = [];

        foreach ($career_sql as $career) {
            $careers[] = [
                'Carrera' => $career->name,
                'Codigo' => $career->code,
            ];
        }

        return ['Estudiante'=>$student,'Carrera(s)'=> $careers];
    }
    // METODO PARA BUSCAR EL ESTUDIANTE
}
