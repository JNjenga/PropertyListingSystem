<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\MessageRequest;
use App\Message;
use App\Property;

class MessageController extends Controller
{
    public function index()
    {
        $messages_all = Message::latest()->get();
        $messages = Message::where([ 'user_id' => Auth::id(), 'seen' =>false])->take(4)->get();
        return view('pages.admin.admin_messages', [ 'messages' => $messages, 'messages_all' => $messages_all]);
    }

    public function store(MessageRequest $request)
    {
        // return 1;
        $prop = Property::findOrFail($request->property_id);
        $recip = $prop->fk_user_id;

        $request->merge(['user_id' => $recip]);

        $message = Message::create($request->all());


        return redirect('/listings/'.$message->property_id)->with('success', 'Message sent successfully');

    }

    public function show($id)
    {
        $messages = Message::where([ 'user_id' => Auth::id(), 'seen' =>false])->take(4)->get();

        $message = Message::findOrFail($id);
        $message->read = true;
        $message->seen = true;

        $message->update();

        return view('pages.admin.admin_message_view', [ 'message' => $message, 'messages' => $messages]);
    }

    public function update(MessageRequest $request, $id)
    {
        $message = Message::findOrFail($id);
        $message->update($request->all());

        return response(['data' => $message ], 200);
    }

    public function read($id)
    {
        $message = Message::findOrFail($id);
        $message->update(['read' => true]);

        return redirect('/admin/messages')->with('success', 'Messages updated !');
    }



    public function destroy($id)
    {
        Message::destroy($id);

        return response(['data' => null ], 204);
    }
}
