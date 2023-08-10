<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educations = Education::orderBy('sort')->get();
        return view('admin-panel.education.index',compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.education.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'univercity' => 'required',
            'faculty' => 'required',
            'field' => 'required',
            'degree' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        Education::create($request->all());

        return redirect()->route('admin.education.index')->with('success', 'Uğurla əlavə edildi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $education = Education::findOrFail($id);
        return view('admin-panel.education.edit',compact('education'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'univercity' => 'required',
            'faculty' => 'required',
            'field' => 'required',
            'degree' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        $education = Education::findOrFail($id);
        $education->univercity = $request->univercity;
        $education->faculty = $request->faculty;
        $education->field = $request->field;
        $education->degree = $request->degree;
        $education->start_date = $request->start_date;
        $education->end_date = $request->end_date;
        $education->save();
        return redirect()->route('admin.education.index')->with('success', 'Dəyişikliklər uğurla yadda saxlanıldı');
    }

    public function sort(Request $request){
       
        $sorts = $request->sort;
        foreach($sorts as $key=>$sort){
            Education::where('id', $sort)->update(['sort' => $key]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $education = Education::findOrFail($id);
        $education->delete();
        return redirect()->route('admin.education.index')->with('success','Uğurla silindi');
    }
}
