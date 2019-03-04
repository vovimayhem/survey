<?php

namespace App\Http\Controllers\Notes;

use App\Models\Note;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function __construct() 
    {
        //Basic Auth middleware and prevent BackHistory
        $this->middleware(['auth', 'preventBackHistory']);

        //Only Admin Middleware
        $this->middleware('isAdmin', ['only' => ['index', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::orderBy('updated_at', 'DESC')->paginate(15);
        return view('admin.notes.index', compact('notes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id'   => 'required|integer',
            'result_id' => 'required|integer',  
            'comment'   => 'required'
        ]);

        $note = new Note();
        $note->user_id   = $request->get('user_id');
        $note->result_id = $request->get('result_id');
        $note->comment   = $request->get('comment');
        $note->save();

        $notification = array(
            'message' => 'The note has been saved successfully!', 
            'alert-type' => 'success'
        );

        return redirect()->route('surveys.show', $request->get('result_id'))->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        return view('admin.notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['comment'=>'required']);
        
        $note = Note::findOrFail($id);
        $note->comment = $request->input('comment');
        $note->save();

        $notification = array(
            'message' => 'The note has been edited successfully!', 
            'alert-type' => 'success'
        );

        return redirect()->route('notes.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();

        $notification = array(
            'message' => 'The note has been deleted successfully!', 
            'alert-type' => 'success'
        );

        return redirect()->route('notes.index')->with($notification);
    }

    /*
    Methods for users Non Admins
    */
    public function myNotes()
    {
        $notes = Note::where('user_id', Auth::user()->id)->orderBy('updated_at', 'DESC')->paginate(15);
        return view('admin.notes.my_notes', compact('notes'));
    }

    public function editMyNote(Note $note)
    {
        return view('admin.notes.edit_my_note', compact('note'));
    }

    public function updateMyNote(Request $request, $id)
    {
        $this->validate($request, ['comment'=>'required']);
        
        $note = Note::findOrFail($id);
        $note->comment = $request->input('comment');
        $note->save();

        $notification = array(
            'message' => 'The note has been edited successfully!', 
            'alert-type' => 'success'
        );

        return redirect()->route('notes.mynotes')->with($notification);
    }
}