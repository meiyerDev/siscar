<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\{Student,Career,License};
use App\Binnacle;
use App\Mail\LicenseCallReceived;
use QrCode;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $careers = Career::all();
        return view('students.create',compact('careers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'identity'      =>  'required|unique:students',
            'first_name'    =>  'required',
            'last_name'     =>  'required',
            'gender'        =>  'required',
            'email'         =>  'required|unique:students',
            'phone'         =>  'nullable',
            'photoAvatar'   =>  'required',
            'canvas'        =>  'required'
        ])->validate();

        $code_career = explode('-', $request->career_id);
        $career = Career::where('code',$code_career)->first();

        $student = Student::create([
            'identity'      =>  $request->identity,
            'first_name'    =>  $request->first_name,
            'last_name'     =>  $request->last_name,
            'gender'        =>  $request->gender,
            'email'         =>  $request->email,
            'phone'         =>  (!is_null($request->phone))?$request->phone:NULL,
            'photo'         =>  $request->photoAvatar,
            'photo_license' =>  $request->photoAvatarBlob,
            'photo_license_2'=>  $request->canvas,
        ]);        
        
        $student->careers()->attach($career->id,[
            'photo'         =>  $request->photoAvatar,
            'photo_license_2' =>  $request->canvas,
        ]);
        
        $binnacle = Binnacle::create([
            'type' => 2,
            'action' => 'Registro Exitoso!',
            'identity' => $request->identity,
            'user_id' => \Auth::user()->id,
        ]);

        return $request->canvas;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photo = Student::select(['photo_license_2','first_name','last_name'])->where('identity',$id)->first();
        return $photo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'identity'          =>  'required',
            'first_name'        =>  'required',
            'last_name'         =>  'required',
            'gender'            =>  'required',
            'email'             =>  'required',
            'phone'             =>  'nullable',
            'photo'             =>  'required',
            'photo_license_2'   =>  'required'
        ])->validate();
        
        $code_career = explode('-', $request->career_id)[0];

        $career = Career::where('code',$code_career)->first();

        $student = Student::findOrFail($id);

        $student->update($request->all());

        $student->careers()->syncWithoutDetaching([$career->id=>[
                    'photo'         =>  $request->photo,
                    'photo_license_2' =>  $request->photo_license_2,
                ]]);

        $binnacle = Binnacle::create([
            'type' => 3,
            'action' => 'Actualización de Datos Exitosa!',
            'identity' => $request->identity,
            'user_id' => \Auth::user()->id,
        ]);
        return response()->json($student->photo_license_2,201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        $identity = $student->identity;

        $student->delete();

        $binnacle = Binnacle::create([
            'type' => 4,
            'action' => 'Eliminado Exitoso!',
            'identity' => $identity,
            'user_id' => \Auth::user()->id,
        ]);

        return back($status = 302);
    }

    // METODO PARA BUSCAR LA FOTO DE ESTUDIANTE
    public function searchPhoto($id)
    {
        $photo = Student::select(['photo','first_name','last_name'])->where('identity',$id)->first();
        return $photo;
    }
    // METODO PARA BUSCAR LA FOTO DE ESTUDIANTE

    // METODO PARA BUSCAR EL ESTUDIANTE
    public function searchStudentInfo(Request $request,$id)
    {
        $student = Student::findOrFail($id);
        if($request->ajax()){
            return response()->json($student,200);
        }else{
            $careers = Career::all();
            return view('students.edit',compact('student','careers'));
        }
    }
    // METODO PARA BUSCAR EL ESTUDIANTE

    public function prueba()
    {
        $s = Student::find(1);
        return view('prueba',compact('s'));
    }
    
}
