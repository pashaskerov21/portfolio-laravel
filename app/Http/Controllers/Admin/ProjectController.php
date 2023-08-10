<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('sort')->get();
        return view('admin-panel.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $categories = ProjectCategory::orderBy('sort')->get();
        return view('admin-panel.projects.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,svg',
            'preview_link' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $project_img = time() . $file->getClientOriginalName();
            $file->move('uploads/projects', $project_img);
        }
        Project::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'image' => $project_img,
            'preview_link' => $request->preview_link,
            'github_link' => $request->github_link,
            'github_status' => $request->github_status,
            'text' => $request->text,
        ]);
        return redirect()->route('admin.projects.index')->with('success', 'Uğurla əlavə edildi');
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
        $categories = ProjectCategory::orderBy('sort')->get();
        $project = Project::findOrFail($id);
        return view('admin-panel.projects.edit', compact(['categories', 'project']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg,svg',
            'preview_link' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $project_img = time() . $file->getClientOriginalName();
            $file->move('uploads/projects', $project_img);
        }else{
            $project_img = null;
        }
        $project = Project::findOrFail($id);
        $project->category_id = $request->category_id;
        $project->name = $request->name;
        $project->image = $project_img;
        $project->preview_link = $request->preview_link;
        $project->github_link = $request->github_link;
        $project->github_status = $request->github_status;
        $project->text = $request->text;
        $project->save();
        return redirect()->route('admin.projects.index')->with('success', 'Dəyişikliklər uğurla yadda saxlanıldı');
    }


    public function sort(Request $request)
    {
        $sorts = $request->sort;
        foreach ($sorts as $key => $sort) {
            Project::where('id', $sort)->update(['sort' => $key]);
        }
    }

    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Uğurla silindi');
    }
}
