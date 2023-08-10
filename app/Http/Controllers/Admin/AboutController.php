<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index(){
        $about = About::find(1);
        return view('admin-panel.about.index', compact('about'));
    }
    public function update(Request $request){
        $this->validate($request, [
            'image' => 'image|mimes:png,jpg,jpeg,svg',
            'cv' => 'mimes:pdf',
        ]);
        $about = About::find(1);
        $about->text = $request->text;
        if($request->hasFile('image')){
            $file = $request->image;
            $new = time() . $file->getClientOriginalName();
            $file->move('uploads/about/images', $new);
            $about->image = $new;
        }
        if($request->hasFile('cv')){
            $file = $request->cv;
            $new = time() . $file->getClientOriginalName();
            $file->move('uploads/about/files', $new);
            $about->cv = $new;
        }
        $about->save();
        return redirect()->route('admin.about')->with('success','Məlumatlar uğurla yeniləndi');
    }
}
