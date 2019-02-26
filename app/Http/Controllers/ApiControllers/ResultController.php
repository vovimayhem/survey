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
        $this->middleware('transform.input:' . ResultTransformer::class)->only(['index', 'update', 'show']);
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
            'question1'     => 'nullable|integer',
            'question2'     => 'nullable|integer',
            'question3'     => 'nullable|integer',
            'question4'     => 'nullable|integer',
            'question5'     => 'nullable|string',
            'language'      => 'nullable|string',
            'feedback'      => 'nullable|string',
            'survey_status' => 'nullable|string',
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

        if( $request->has('survey_status') ) {
            $result->survey_status = $request->survey_status;
        }

        $result->save();
        return $this->showOne($result);
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
}