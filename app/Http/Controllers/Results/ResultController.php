<?php

namespace App\Http\Controllers\Results;

use App\Models\Note;
use App\Models\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResultController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'preventBackHistory']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $results = Result::where('survey_status', '!=', 'Created')->orderBy('updated_at', 'DESC')->paginate(15);
        return view('admin.results.index', compact('results'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Result::find($id);
        $notes = Result::find($id)->notes->sortByDesc('updated_at')->take(9);
        $remainders = Result::find($id)->reminders;
        return view('admin.results.show', compact('result', 'notes', 'remainders'));
    }
}