<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\People;
use App\Conversation;

class ConversationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $conversation                   = new Conversation();
        $conversation->title            = $request->title;
        $conversation->content          = $request->description;
        $conversation->people_id        = $request->people;

        if ($request->date != "")
            $conversation->created_at   = $request->date;
        
        $conversation->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $conversation = Conversation::find($id);

        return view('conversation.show', compact('conversation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $conversation = Conversation::find($id);
        
        return view('conversation.edit', compact('conversation'));
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
        $conversation               = Conversation::find($id);
        $conversation->title        = $request->title;
        $conversation->content      = $request->description;
        $conversation->created_at   = $request->date;
        
        $conversation->save();

        return redirect('conversation/search/'.$conversation->people_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $conversation = Conversation::find($id);
        $conversation->delete();

        return back();
    }

    public function search($id)
    {
        $people         = People::find($id);
        $conversations  = $people->conversations()->paginate(10);
        

        return view('conversation.index', compact('people', 'conversations'));
    }
}
