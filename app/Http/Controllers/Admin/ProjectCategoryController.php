<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProjectCategory::orderBy('sort')->get();
        return view('admin-panel.project-categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.project-categories.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $categories = ProjectCategory::create($request->all());

        return redirect()->route('admin.project-categories.index')->with('success', 'Uğurla əlavə edildi');
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
        $category = ProjectCategory::findOrFail($id);
        return view('admin-panel.project-categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $category = ProjectCategory::findOrFail($id);
        $category->name = $request->name;        
        $category->save();
        return redirect()->route('admin.project-categories.index')->with('success', 'Dəyişikliklər uğurla yadda saxlanıldı');
    }

    public function sort(Request $request){
       
        $sorts = $request->sort;
        foreach($sorts as $key=>$sort){
            ProjectCategory::where('id', $sort)->update(['sort' => $key]);
        }
    }

    public function destroy(string $id)
    {
        $category = ProjectCategory::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.project-categories.index')->with('success','Uğurla silindi');
    }
}
