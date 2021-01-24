<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        // $messages = Message::where('user_id', $user->id)->get();
        // $users = User::with(['roles', 'image', 'detail'])->get();
        $messages = Message::all();
        $data = array('messages' => $messages);
        return view('dashboard.messages')->with('data', $data);
    }

    public function create()
    {
        // Will direct the user to the message creation screen.


    }
    
    public function store(Request $request)
    {
        // Will store the message in the database which was created 
        // on the message creation screen or function create().

        // Check to see if the user exists.

        // 
    }
    
    public function show(Message $message)
    {
        // Shows a single message
        // May have to do this through livewire
    }

    public function edit(Message $message)
    {
        // Will allow the user to edit the message as long as the 
        // message hasn't been seen. If the message has been seen 
        // then it will be locked.
    }

    public function update(Request $request, Message $message)
    {
        $message->head = $request->input('head');
        $message->body = $request->input('body');
        $message->save();
        return redirect()->route('message.index');
    }

    public function destroy(Message $message)
    {
        // Destroys the messageg if the user who it was sent to 
        // hasn't yet seen the message.

        $data = Message::find($message->id);
        $data->delete();
        return redirect()->route('message.index');
    }

    public function lock(Message $message)
    {

    }
}
