<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\JobField;
use Illuminate\Http\Request;

class JobFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobfields = JobField::all();
        $departments = Department::all();
        return view('jobField.index', compact('jobfields', 'departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobfields = JobField::all();
        $departments = Department::all();
        return view('jobField.create', compact('jobfields', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jobfield = new JobField();
        $jobfield->department_id = $request->input('department');
        $jobfield->job_field = $request->input('jobField');
        $jobfield->about = $request->input('about');
        $jobfield->skills = $request->input('skills');

        if ($jobfield->save()) {
            return redirect()->back()->with('success', 'تم الحفظ بنجاح');
        }
        return redirect()->back()->with('failed', 'فشل، لم يتم الحفظ !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobField  $jobField
     * @return \Illuminate\Http\Response
     */
    public function show($id, $name)
    {
        $jobfields = JobField::where("department_id", "like", $id)->get();
        $departments = Department::all();
        return view('jobField.show', compact('jobfields', 'name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobField  $jobField
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobfield = JobField::find($id);
        $departments = Department::all();
        return view('jobField.edit', compact('jobfield', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobField  $jobField
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $jobfield =  JobField::find($id);
        $jobfield->department_id = $request->input('department');
        $jobfield->job_field = $request->input('jobField');
        $jobfield->about = $request->input('about');
        $jobfield->skills = $request->input('skills');

        if ($jobfield->save()) {
            return redirect()->back()->with('success', 'تم التحديث بنجاح');
        }
        return redirect()->back()->with('failed', 'فشل، لم يتم التحديث !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobField  $jobField
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobfield =  JobField::find($id);
        if (JobField::destroy($id)) {
            return redirect()->back()->with('deleted', 'تم الحذف بنجاح');
        }
        return redirect()->back()->with('delete_failed', 'خطا، لم يتم الحذف');
    }
}
