<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index(){
        $banner = Banner::find(1);
        return view('admin-panel.banner.index', compact('banner'));
    }
    public function update(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'subtitle' => 'required',
            'text' => 'required',
        ]);
        $banner = Banner::find(1);
        $banner->title = $request->title;
        $banner->subtitle = $request->subtitle;
        $banner->text = $request->text;
        $banner->save();
        return redirect()->route('admin.banner')->with('success','Məlumatlar uğurla yeniləndi');
    }
}
