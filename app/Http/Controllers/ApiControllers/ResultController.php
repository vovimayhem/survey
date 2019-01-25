<?php

namespace App\Http\Controllers\ApiControllers;

use App\Models\Result;
use Illuminate\Http\Request;
use App\Transformers\ResultTransformer;
use App\Http\Controllers\ApiControllers\ApiController;

class ResultController extends ApiController
{
    public function __construct() {
        parent::__construct();
        $this->middleware('transform.input:' . ResultTransformer::class)->only(['index', 'store', 'update', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Result::all();
        return $this->showAll($results);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'case_number' => 'required|unique:results',
            'question1'   => 'required|integer',
            'question2'   => 'required|integer',
            'question3'   => 'required|integer',
            'question4'   => 'required|integer',
            'question5'   => 'required|boolean',
            'language'    => 'required|string',
            'feedback'    => 'nullable|string',
            'status'      => 'required|boolean',
        ];

        $this->validate($request, $rules);

        $fields = $request->all();
        $fields['case_number'] = $request->case_number;
        $fields['question1']   = $request->question1;
        $fields['question2']   = $request->question2;
        $fields['question3']   = $request->question3;
        $fields['question4']   = $request->question4;
        $fields['question5']   = $request->question5;
        $fields['language']    = $request->language;
        $fields['feedback']    = $request->feedback;
        $fields['status']      = $request->question4;

        $result = Result::create($fields);
        return $this->showOne($result, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Result::findOrFail($id);
        return $this->showOne($result);
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
        $result = Result::findOrFail($id);

        $rules = [
            'question1'   => 'required|integer',
            'question2'   => 'required|integer',
            'question3'   => 'required|integer',
            'question4'   => 'required|integer',
            'question5'   => 'required|boolean',
            'language'    => 'required|string',
            'feedback'    => 'nullable|string',
            'status'      => 'required|boolean',
        ];

        $this->validate($request, $rules);
        
        $result->question1   = $request->question1;
        $result->question2   = $request->question2;
        $result->question3   = $request->question3;
        $result->question4   = $request->question4;
        $result->question5   = $request->question5;
        $result->language    = $request->language;
        $result->feedback    = $request->feedback;
        $result->status      = $request->status;

        $result->save();
        
        return $this->showOne($result);
    }
}