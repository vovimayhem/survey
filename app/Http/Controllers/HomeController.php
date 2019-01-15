<?php

namespace App\Http\Controllers;

use App\Result;
use Illuminate\Http\Request;
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
       $result->question1 = $request->input('rating1');
       $result->question2 = $request->input('rating2');
       $result->question3 = $request->input('rating3');
       $result->question4 = $request->input('rating4');

       $quality = $request->get('quality');

       if( $quality == 'Absolutely' ) {
        $result->question5 = true;
       } else {
        $result->question5 = false;
       }

       $result->question6 = $request->only('texthere');
       $result->save;

       return redirect()->route('survey');
   }
}
