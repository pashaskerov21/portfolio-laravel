<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = Experience::orderBy('sort')->get();
        return view('admin-panel.experience.index',compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.experience.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'position' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'company' => 'required',
            'company_location' => 'required',
        ]);
        Experience::create($request->all());

        return redirect()->route('admin.experience.index')->with('success', 'Uğurla əlavə edildi');
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
        $experience = Experience::findOrFail($id);
        return view('admin-panel.experience.edit',compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'position' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'company' => 'required',
            'company_location' => 'required',
        ]);
        $experience = Experience::findOrFail($id);
        $experience->position = $request->position;
        $experience->start_date = $request->start_date;
        $experience->end_date = $request->end_date;
        $experience->company = $request->company;
        $experience->company_location = $request->company_location;
        $experience->save();
        return redirect()->route('admin.experience.index')->with('success', 'Dəyişikliklər uğurla yadda saxlanıldı');
    }

    public function sort(Request $request){
       
        $sorts = $request->sort;
        foreach($sorts as $key=>$sort){
            Experience::where('id', $sort)->update(['sort' => $key]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $experience = Experience::findOrFail($id);
        $experience->delete();
        return redirect()->route('admin.experience.index')->with('success','Uğurla silindi');
    }
}
