<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menuLinks = Menu::orderBy('sort')->get();
        return view('admin-panel.menu.index',compact('menuLinks'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.menu.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        Menu::create($request->all());

        return redirect()->route('admin.menu.index')->with('success', 'Uğurla əlavə edildi');

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
        $link = Menu::findOrFail($id);
        return view('admin-panel.menu.edit',compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $link = Menu::findOrFail($id);
        $link->name = $request->name;        
        $link->save();
        return redirect()->route('admin.menu.index')->with('success', 'Dəyişikliklər uğurla yadda saxlanıldı');
    }

    public function sort(Request $request){
       
        $sorts = $request->sort;
        foreach($sorts as $key=>$sort){
            Menu::where('id', $sort)->update(['sort' => $key]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $link = Menu::findOrFail($id);
        $link->delete();
        return redirect()->route('admin.menu.index')->with('success','Uğurla silindi');
    }
}
