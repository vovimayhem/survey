<?php

namespace App\Http\Controllers\Survey;

use App\Models\Result;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
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
      $this->middleware('survey.completed', ['except' => ['show_thanks_view']] );
      $this->middleware('valid.survey');
    }

    public function show_survey_view($lang, $case)
    {
      $case_param = $case;
      App::setlocale($lang);

      $result = Result::where('case_number', $case)->get()->first();

      if( empty($result) ) {
        $result = new Result();
        $result->case_number = $case;
        $result->question1 = 0;
        $result->question2 = 0;
        $result->question3 = 0;
        $result->question4 = 0;
        $result->question5 = '0';
        $result->language  = $lang;
        $result->feedback  = null;
        $result->status    = '0';
        $result->save();
      }
      return view('survey.home', compact('case_param', 'result'));
    }

    public function show_welcome_view($lang, $case)
    {
      $case_param = $case;
      App::setlocale($lang);
      return view('survey.welcome', compact('case_param'));
    }

    public function show_thanks_view($lang, $case)
    {
      $case_param = $case;
      App::setlocale($lang);
      return view('survey.thanks', compact('case_param'));
    }

    public function store(StoreSurveyResponse $request, $lang, $case)
    {

     $validated = $request->validated();

     $result = Result::where('case_number', $case)->get()->first();
     $result->question1 = $request->get('rating1');
     $result->question2 = $request->get('rating2');
     $result->question3 = $request->get('rating3');
     $result->question4 = $request->get('rating4');

     $quality = $request->get('quality');

     if( $quality == 'Absolutely' ) {
      $result->question5 = '1';
    } else {
      $result->question5 = '0';
    }

    $result->language = $lang;
    $result->feedback = $request->get('feedback');
    $result->status = '1';
    $result->save();

    return redirect()->route('thanks', [$lang, $case]);
  }
}