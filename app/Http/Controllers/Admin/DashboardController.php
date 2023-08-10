<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $skills = Skill::all();
        $projects = Project::all();
        $experiences = Experience::all();
        $educations = Education::all();
        return view('admin-panel.dashboard.index', compact(['skills','projects','experiences','educations']));
    }
}
