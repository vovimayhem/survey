<?php

namespace App\Http\Controllers\Admin;

use App\Models\Result;
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
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Result::orderBy('id', 'name', 'DESC')->paginate(20);
        return view('admin.dashboard', compact('results'));
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
        return view('admin.show', compact('result'));
    }
}