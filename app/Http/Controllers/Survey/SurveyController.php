<?php

namespace App\Http\Controllers\Survey;

use App\Models\Result;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSurveyResponse;

class SurveyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('survey.home');
    }

    public function store(StoreSurveyResponse $request)
    {
   
       $validated = $request->validated();

       $result = new Result();
       $result->case_number = rand(10000, 60000);
       $result->question1 = $request->get('rating1');
       $result->question2 = $request->get('rating2');
       $result->question3 = $request->get('rating3');
       $result->question4 = $request->get('rating4');

       $quality = $request->get('quality');

       if( $quality == 'Absolutely' ) {
        $result->question5 = true;
       } else {
        $result->question5 = false;
       }

       $result->feedback = $request->get('feedback');
       $result->save();

       return redirect()->route('thanks');
   }

    public function show_welcome_view()
    {
        return view('survey.welcome');
    }

    public function show_thanks_view()
    {
        return view('survey.thanks');
    }
}
