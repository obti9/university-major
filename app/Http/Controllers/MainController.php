<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Department;
use App\Models\FieldOfStudy;
use App\Models\Qualified;
use App\Models\Univer;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index()
    {
        $qualifieds = Qualified::all();
        $fieldofstudies = '';
        return view('index', compact('qualifieds', 'fieldofstudies'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getData(Request $request)
    {
        $univers = Univer::all();
        $colleges = College::all();
        $departments = Department::all();
        $qualifieds = Qualified::all();
        $qualified = $request->input('qualified');
        $acceptance_percentage = $request->input('acceptance_percentage');
        $fieldofstudies = FieldOfStudy::where("qualified_id", "like", $qualified)->where("acceptance_percentage", "<=", $acceptance_percentage)->get();
        return view('index', compact('fieldofstudies', 'univers', 'colleges', 'departments', 'qualifieds'));
        //return redirect()->back()->compact('fieldofstudies', 'univers', 'colleges', 'departments', 'qualifieds');
    }
}
