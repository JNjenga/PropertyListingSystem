<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\MessageRequest;
use App\Message;
use App\Property;

class agentsMessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages_all = Message::latest()->get();
        $messages = Message::where([ 'user_id' => Auth::id(), 'seen' =>false])->take(4)->get();
        return view('pages.agent.agents_messages', [ 'messages' => $messages, 'messages_all' => $messages_all]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // return 1;
         $prop = Property::findOrFail($request->property_id);
         $recip = $prop->fk_user_id;
 
         $request->merge(['user_id' => $recip]);
 
         $message = Message::create($request->all());
 
 
         return redirect('/listings/'.$message->property_id)->with('success', 'Message sent successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $messages = Message::where([ 'user_id' => Auth::id(), 'seen' =>false])->take(4)->get();

        $message = Message::findOrFail($id);
        $message->read = true;
        $message->seen = true;

        $message->update();

        return view('pages.agent.agents_message_view', [ 'message' => $message, 'messages' => $messages]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message = Message::findOrFail($id);
        $message->update($request->all());

        return response(['data' => $message ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function read($id)
    {
        $message = Message::findOrFail($id);
        $message->update(['read' => true]);

        return redirect('/agents/messages')->with('success', 'Messages updated !');
    }

    public function destroy($id)
    {
        Message::destroy($id);

        return response(['data' => null ], 204);
    }
}
