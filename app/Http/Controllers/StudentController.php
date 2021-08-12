<?php

namespace App\Http\Controllers;

use App\Models\ClassModels;
use App\Models\StudentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $listStudent = DB::table('student')
        ->join('classroom', 'classroom.idClass', '=', 'student.idClass')
        ->select('student.*', 'classroom.nameClass')
        ->where('name','LIKE', "%$search%")->paginate(4);
        
        return view('student.index',[
            'listStudent'=>$listStudent,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listClass = ClassModels::all();
        return view('student.create', [
            'listClass' => $listClass
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');
        $gender = $request->get('gender');
        $dob = $request->get('date');
        $class = $request->get('idClass');
        $student = new StudentModel();
        $student->name = $name;
        $student->email = $email;
        $student->password = $password;
        $student->gender = $gender;
        $student->dob = $dob;
        $student->idClass = $class;
        $student->save();
        return redirect(route('student.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = StudentModel::find($id);
        $listClass = ClassModels::all();
        return view('student.edit',[
            'student' => $student,
            'listClass' => $listClass,
        ]);
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
        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');
        $gender = $request->get('gender');
        $date = $request->get('date');
        $idClass = $request->get('idClass');
        StudentModel::where('idStudent',$id)->update([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'gender' => $gender,
            'dob' => $date,
            'idClass' => $idClass,
        ]);
        return redirect(route('student.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
