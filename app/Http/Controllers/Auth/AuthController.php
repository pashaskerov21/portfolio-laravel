<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin-panel.auth.admin_login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.login')->with('error', 'Email və ya parol yanlışdır');
        }
    }
    public function logout()
    {
        auth()->logout();
        return view('admin-panel.auth.admin_logout');
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $admin = User::findOrFail($id);
        return view('admin-panel.auth.edit', compact('admin'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'email' => 'email|required',
            'current_password' => 'required',
        ]);


        $admin = User::findOrFail($id);

        if (Hash::check($request->current_password, $admin->password)) {
            $admin->name = $request->name;
            $admin->email = $request->email;
            if ($request->new_password) {
                $admin->password = Hash::make($request->new_password);
            }
            $admin->save();
            return redirect()->bacK()->with('success', 'Dəyişikliklər uğurla yadda saxlanıldı');
        } else {
            return redirect()->back()->with('current_password-error', 'Mövcud şifrə düzgün deyil');
        }
    }


    public function destroy(string $id)
    {
        //
    }
}
