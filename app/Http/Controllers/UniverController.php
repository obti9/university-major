<?php

namespace App\Http\Controllers;

use App\Models\Univer;
use Illuminate\Http\Request;

class UniverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universities = Univer::all();
        return view('university.index', compact('universities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('university.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $university = new Univer();
        $university->name = $request->input('universityName');
        if ($university->save()) {
            return redirect()->back()->with('success', 'تم الحفظ بنجاح');
        }
        return redirect()->back()->with('failed', 'فشل، لم يتم الحفظ !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function show(Univer $university)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Univer  $university
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $university = Univer::find($id);
        return view('university.edit', compact('university'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $university = Univer::find($id);
        $university->name = $request->input('universityName');
        if ($university->save()) {
            return redirect()->back()->with('success', 'تم تحديث البيانات بنجاح');
        }
        return redirect()->back()->with('failed', 'خطا، لم يتم التحديث');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Univer  $university
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $university = Univer::find($id);
        if (Univer::destroy($id)) {
            return redirect()->back()->with('deleted', 'تم الحذف بنجاح');
        }
        return redirect()->back()->with('delete_failed', 'خطا، لم يتم الحذف');
    }
}
