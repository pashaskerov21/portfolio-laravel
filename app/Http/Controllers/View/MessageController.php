<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
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
        Message::create($request->all());

        Mail::send('admin-panel.email_temp', ['msg_data' => $msg_data], function ($message) use($msg_data) {
            //$message->from($msg_data['email']);
            $message->to('askerovpasha21@gmail.com');
            $message->subject($msg_data['title']);
        });
        return redirect()->route('index')->with('email-success','Successfully');
    }
}
