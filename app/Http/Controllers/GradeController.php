<?php

namespace App\Http\Controllers;

use App\Imports\GradeImport;
use App\Models\ClassModels;
use App\Models\GradeModel;
use App\Models\StudentModel;
use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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

    //SELECT student.*, grades.Skill1 FROM `student` inner join grades on student.idStudent = grades.idStudent

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
        $idSub = $request->get('idSubject');
        $skillGrade = $request->get('skillGrade');
        $finalGrade = $request->get('finalGrade');
        $grade = new GradeModel();
        if($grade::where('idStudent',$idStudent)->where('idSub',$idSub)->exists()){
            return redirect(route('grade.index'))->with('error', 'Thêm điểm không thành công sinh viên đã có điểm môn được chọn');
        }
        $grade->idStudent = $idStudent;
        $grade->idSub = $idSub;
        $grade->Skill1 = $skillGrade;
        $grade->Final1 = $finalGrade;
        $grade->save();
        return redirect(route('grade.index'))->with('success', 'Thêm điểm thành công');
    }

    public function insertByExcel(){
        return view('grade.insert-by-excel');
    }
    
    public function insertByExcelProcess(Request $request){
        Excel::import(new GradeImport, $request->file('excel'));
        return view('grade.insert-by-excel')->with('success', 'Thêm điểm thành công');
    }
}
