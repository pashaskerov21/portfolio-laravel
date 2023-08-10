<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::orderBy('seen_date')->get();
        return view('admin-panel.messages.index', compact('messages'));
    }

    public function send(Request $request){
        $this->validate($request, [
            'email' => 'email|required',
            'title' => 'required',
            'text' => 'required',
        ]);
        $msg_data = [
            'email' => $request->email,
            'title' => $request->title,
            'text' => $request->text,
        ];
        

        Mail::send('admin-panel.email_temp', ['msg_data' => $msg_data], function ($message) use($msg_data) {
            //$message->from('askerovpasha21@gmail.com');
            $message->to($msg_data['email']);
            $message->subject($msg_data['title']);
        });
        return redirect()->route('admin.messages.index')->with('success','Uğurla göndərildi');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $message = Message::findOrFail($id);
        if($message->seen_date === null){
            $message->seen_date = now();
            $message->save();
        }
        return view('admin-panel.messages.view', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect()->route('admin.messages.index')->with('success','Uğurla silindi');
    }
}
