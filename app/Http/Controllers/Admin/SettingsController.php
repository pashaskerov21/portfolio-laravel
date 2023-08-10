<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index(){
        $settings = Setting::find(1);
        return view('admin-panel.settings.index', compact('settings'));
    }
    public function update(Request $request){
        $this->validate($request, [
            'logo' => 'image|nullable|mimes:png,jpg,jpeg,svg',
            'favicon' => 'image|nullable|mimes:png,jpg,jpeg,svg',
        ]);
        $settings = Setting::find(1);
        $settings->title = $request->title;
        $settings->logo_text = $request->logo_text;
        $settings->description = $request->description;
        $settings->keywords = $request->keywords;
        $settings->author = $request->author;
        $settings->copyright = $request->copyright;
        $settings->mail = $request->mail;
        $settings->phone = $request->phone;
        $settings->github = $request->github;
        $settings->linkedin = $request->linkedin;


        if($request->hasFile('logo')){
            $file = $request->logo;
            $new = time() . $file->getClientOriginalName();
            $file->move('uploads/settings/images', $new);
            $settings->logo = $new;
        }
        if($request->hasFile('favicon')){
            $file = $request->favicon;
            $new = time() . $file->getClientOriginalName();
            $file->move('uploads/settings/images', $new);
            $settings->favicon = $new;
        }

        $settings->save();
        return redirect()->route('admin.settings')->with('success','Məlumatlar uğurla yeniləndi');
    }
}
