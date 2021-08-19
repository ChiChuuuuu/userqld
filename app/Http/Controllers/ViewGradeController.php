<?php

namespace App\Http\Controllers;

use App\Models\ClassModels;
use App\Models\StudentModel;
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
        $idClass = $request->get('id-class');
        $listStudent =  DB::table('grades')
        ->join('student', 'grades.idStudent', '=', 'student.idStudent')
        ->join('subject', 'subject.idSub', '=','grades.idSub')
        ->where('idClass','=',$idClass)
        ->paginate(5);
        
        //SELECT grades.* , student.* ,subject.nameSub FROM `grades` inner JOIN student on student.idStudent = grades.idStudent 
        //inner join subject on grades.idSub = subject.idSub
        
        $listClass = ClassModels::all();
        return view('viewgrade.index', [
            'listStudent' => $listStudent,
            'listClass' => $listClass,
            'search' => $search,
            'idClass' => $idClass,
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
    public function show($id)
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
