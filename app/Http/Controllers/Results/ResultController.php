<?php

namespace App\Http\Controllers\Results;

use App\Models\Result;
use Illuminate\Http\Request;
use App\Exports\ResultExport;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Laracasts\Utilities\JavaScript\JavaScriptFacade;

class ResultController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth', ['except' => ['show']] );
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $results = Result::orderBy('updated_at', 'DESC')->paginate(15);
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
        return view('admin.results.show', compact('result'));
    }
}