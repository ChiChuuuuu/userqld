<?php

namespace App\Http\Controllers;

use App\Models\ClassModels;
use App\Models\StudentModel;
use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $listClass = DB::table('classroom')
            ->where('classroom.nameClass', 'LIKE', "%$search%")->paginate('4');
        return view('viewgrade.index', [
            "listClass" => $listClass,
            "search" => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $idClass = $request->get('id-subject');
        $listStudent =  DB::table('student')
            ->join('grades', 'grades.idStudent', '=', 'student.idStudent')
            ->join('classroom', 'classroom.idClass', '=', 'student.idClass')
            ->join('subject','subject.idSub','=','grades.idSub')
            ->where('classroom.idClass', '=', $id)
            ->where('subject.idSub', '=', $idClass)
            ->get();

            // select * from `student` inner join `grades` on `grades`.`idStudent` = `student`.`idStudent` 
            //inner join `classroom` on `classroom`.`idClass` = `student`.`idClass` inner join `subject` ON subject.idSub = grades.idSub WHERE subject.idSub = 7

        $listClass = DB::table('classroom')
            ->join('major', 'classroom.idMajor', '=', 'major.idMajor')
            ->select('classroom.*', 'major.nameMajor')
            ->where('idClass', '=', $id)
            ->get();

        // SELECT * from student inner join grades on grades.idStudent = student.idStudent inner join subject on grades.idSub = subject.idSub WHERE subject.idSub = 1

        $listSubject = DB::table('subject')
        ->join('major','major.idMajor','=','subject.idMajor')
        ->join('classroom','classroom.idMajor','=','major.idMajor')
        ->where('idClass','=',$id)
        ->get();

        //select * FROM subject INNER JOIN major on subject.idMajor = major.idMajor INNER JOIN classroom ON classroom.idMajor = major.idMajor where idClass = 5

        return view('viewgrade.view', [
            'listStudent' => $listStudent,
            'listSubject' => $listSubject,
            'listClass' => $listClass,
            'idClass' => $idClass,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
