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
            'question5'   => 'required|string',
            'language'    => 'required|string',
            'feedback'    => 'nullable|string',
            'status'      => 'required|string',
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
            'question1'   => 'nullable|integer',
            'question2'   => 'nullable|integer',
            'question3'   => 'nullable|integer',
            'question4'   => 'nullable|integer',
            'question5'   => 'nullable|string',
            'language'    => 'nullable|string',
            'feedback'    => 'nullable|string',
            'status'      => 'nullable|string',
        ];

        $this->validate($request, $rules);

        if( $request->has('question1') ) {
            $result->question1 = $request->question1;
        }

        if( $request->has('question2') ) {
            $result->question2 = $request->question2;
        }

        if( $request->has('question3') ) {
            $result->question3 = $request->question3;
        }

        if( $request->has('question4') ) {
            $result->question4 = $request->question4;
        }

        if( $request->has('question5') ) {
            $result->question5 = $request->question5;
        }


        if( $request->has('language') ) {
            $result->language = $request->language;
        }

        if( $request->has('feedback') ) {
            $result->feedback = $request->feedback;
        }

        if( $request->has('status') ) {
            $result->status = $request->status;
        }

        $result->save();
        return $this->showOne($result);
    }
}