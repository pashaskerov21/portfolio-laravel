<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Banner;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Menu;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Setting;
use App\Models\Skill;
use App\Models\Theme;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        $settings = Setting::find(1);
        $menuLinks = Menu::orderBy('sort')->get();
        $banner = Banner::find(1);
        $about = About::find(1);
        $skills = Skill::orderBy('sort')->get();
        $categories = ProjectCategory::orderBy('sort')->get();
        $projects = Project::orderBy('sort')->get();
        $experiences = Experience::orderBy('sort')->get();
        $educations = Education::orderBy('sort')->get();
        return view('site.index', compact(['settings', 'menuLinks','banner', 'about','skills','categories','projects','experiences','educations']));
    }
    
}
