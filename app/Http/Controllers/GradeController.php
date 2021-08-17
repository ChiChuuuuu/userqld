<?php

namespace App\Http\Controllers;

use App\Models\ClassModels;
use App\Models\StudentModel;
use Illuminate\Http\Request;

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
        return view('grade.index',[
            'listClass' => $listClass,
        ]);
    }

    public function getStudentsByIDClass($id){
        $listStudent = StudentModel::where('idClass', $id)->get();
        return $listStudent;
    }
}
