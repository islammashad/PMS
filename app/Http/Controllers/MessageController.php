<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;
use App\User;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::where('from_user_id', Auth::user()->id)->orWhere('to_user_id', Auth::user()->id)->orderBy('messages.updated_at', 'DESC')->get();
        return view('message.list')->with('messages', $messages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('message.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate( $request, [
            'message_content' => 'required'
        ] ) ;        

        $message_new = new Message;
        $message_new->content =  $request->message_content;
        $message_new->to_user_id = $request->to_id;
        $message_new->from_user_id = $request->from_id;
        $message_new->save() ;
        Session::flash('success', 'Message Sent Successfully') ;
        return redirect()->route('message.list') ;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_message = Message::find($id) ;
        $delete_message->delete() ;
        Session::flash('success', 'Message Deleted Successfully') ;
        return redirect()->back();
    }
}
