<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Department;
use App\Models\FieldOfStudy;
use App\Models\Qualified;
use App\Models\Univer;
use Illuminate\Http\Request;

class FieldOfStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fieldofstudies = FieldOfStudy::all();
        $univers = Univer::all();
        $colleges = College::all();
        $departments = Department::all();
        $qualifieds = Qualified::all();
        return view('studyField.index', compact('fieldofstudies', 'univers', 'colleges', 'departments', 'qualifieds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $univers = Univer::all();
        $colleges = College::all();
        $departments = Department::all();
        $qualifieds = Qualified::all();
        return view('studyField.create', compact('univers', 'colleges', 'departments', 'qualifieds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fieldofstudy = new FieldOfStudy();
        $fieldofstudy->university_id = $request->input('university');
        $fieldofstudy->college_id = $request->input('college');
        $fieldofstudy->department_id = $request->input('department');
        $fieldofstudy->acceptance_percentage = $request->input('acceptance_percentage');
        $fieldofstudy->qualified_id = $request->input('qualified');

        $fieldofstudy->user_id = 0;
        if ($fieldofstudy->save()) {
            return redirect()->back()->with('success', 'تم الحفظ بنجاح');
        }
        return redirect()->back()->with('failed', 'فشل، لم يتم الحفظ !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FieldOfStudy  $fieldOfStudy
     * @return \Illuminate\Http\Response
     */
    public function show(FieldOfStudy $fieldOfStudy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FieldOfStudy  $fieldOfStudy
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fieldofstudy = FieldOfStudy::find($id);
        $univers = Univer::all();
        $colleges = College::all();
        $departments = Department::all();
        $qualifieds = Qualified::all();
        return view('studyField.edit', compact('fieldofstudy', 'univers', 'colleges', 'departments', 'qualifieds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FieldOfStudy  $fieldOfStudy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $fieldofstudy =  FieldOfStudy::find($id);
        $fieldofstudy->university_id = $request->input('university');
        $fieldofstudy->college_id = $request->input('college');
        $fieldofstudy->department_id = $request->input('department');
        $fieldofstudy->acceptance_percentage = $request->input('acceptance_percentage');
        $fieldofstudy->qualified_id = $request->input('qualified');

        $fieldofstudy->user_id = 0;
        if ($fieldofstudy->save()) {
            return redirect()->back()->with('success', 'تم التحديث بنجاح');
        }
        return redirect()->back()->with('failed', 'فشل، لم يتم التحديث !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FieldOfStudy  $fieldOfStudy
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fieldofstudy = FieldOfStudy::find($id);
        if (FieldOfStudy::destroy($id)) {
            return redirect()->back()->with('deleted', 'تم الحذف بنجاح');
        }
        return redirect()->back()->with('delete_failed', 'خطا، لم يتم الحذف');
    }
}
