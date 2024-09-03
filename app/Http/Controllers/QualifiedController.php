<?php

namespace App\Http\Controllers;

use App\Models\Qualified;
use Illuminate\Http\Request;

class QualifiedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qualifieds = Qualified::all();
        return view('qualified.index', compact('qualifieds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('qualified.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $qualified = new Qualified();
        $qualified->name = $request->input('qualifiedName');
        if ($qualified->save()) {
            return redirect()->back()->with('success', 'تم الحفظ بنجاح');
        }
        return redirect()->back()->with('failed', 'فشل، لم يتم الحفظ !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Qualified  $qualified
     * @return \Illuminate\Http\Response
     */
    public function show(Qualified $qualified)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Qualified  $qualified
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $qualified = Qualified::find($id);
        return view('qualified.edit', compact('qualified'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Qualified  $qualified
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $qualified = Qualified::find($id);
        $qualified->name = $request->input('qualifiedName');
        if ($qualified->save()) {
            return redirect()->back()->with('success', 'تم تحديث البيانات بنجاح');
        }
        return redirect()->back()->with('failed', 'خطا، لم يتم التحديث');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Qualified  $qualified
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $qualified = Qualified::find($id);
        if (Qualified::destroy($id)) {
            return redirect()->back()->with('deleted', 'تم الحذف بنجاح');
        }
        return redirect()->back()->with('delete_failed', 'خطا، لم يتم الحذف');
    }
}
