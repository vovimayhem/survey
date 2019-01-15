<?php

namespace App\Http\Controllers;

use App\Result;
use App\Http\Requests\StoreSurveyResponse;

class HomeController extends Controller
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
        return view('survey');
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

       $result->feedback = $request->get('texthere');
       $result->save();

       return redirect()->route('survey');
   }
}
