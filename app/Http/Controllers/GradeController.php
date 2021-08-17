<?php

namespace App\Http\Controllers;

use App\Models\ClassModels;
use App\Models\GradeModel;
use App\Models\StudentModel;
use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listClass = ClassModels::all();
        $listSub = SubjectModel::all();
        $listGrade = GradeModel::all();
        return view('grade.index', [
            'listClass' => $listClass,
            'listSub' => $listSub,
            'listGrade' => $listGrade,
        ]);
    }

    public function getStudentsByIDClass($id)
    {
        $listStudent = StudentModel::where('idClass', $id)->get();
        return $listStudent;
    }

    public function getSubjectByIdClass($id){
        $listSub = DB::table('subject')
        ->join('major','major.idMajor','=','subject.idMajor')
        ->join('classroom','classroom.idMajor','=','major.idMajor')
        ->where('idClass','=',$id)
        ->get();
        return $listSub;
    }

    public function store(Request $request)
    {
        $idStudent = $request->get('idStudent');
        $idSub = $request->get('idSub');
        $skillGrade = $request->get('skillGrade');
        $finalGrade = $request->get('finalGrade');
        $grade = new GradeModel();
        $grade->idStudent = $idStudent;
        $grade->idSub = $idSub;
        $grade->Skill1 = $skillGrade;
        $grade->Final1 = $finalGrade;
        $grade->save();
        return redirect(route('student.index'));
    }
}
