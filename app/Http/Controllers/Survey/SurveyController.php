<?php

namespace App\Http\Controllers\Survey;

use App\Models\Result;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use App\Notifications\SurveyCompleted;
use App\Notifications\BadCustomerReview;
use App\Http\Requests\StoreSurveyResponse;
use Illuminate\Support\Facades\Notification;

class SurveyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('survey.completed', ['except' => ['show_thanks_view', 'show_dummy_survey']] );
      //$this->middleware('valid.survey');
    }

    public function show_survey_view($lang, $case)
    {
      $case_param = $case;
      App::setlocale($lang);

      $result = Result::where('case_number', $case)->get()->first();

      $base_url = URL::to('/');
      $url = null;
      
      if( $lang == 'en') {
        $url = URL::to('/') . '/welcome/en/case/' . $case_param;
        $lang = 'en';
      } else {
        $url = URL::to('/') . '/welcome/es/case/' . $case_param;
        $lang = 'es';
      }

      if( empty($result) ) {
        $result = new Result();
        $result->case_number = $case;
        $result->question1   = 0;
        $result->question2   = 0;
        $result->question3   = 0;
        $result->question4   = 0;
        $result->question5   = Result::SURVEY_STATUS_FALSE;
        $result->language    = $lang;
        $result->feedback    = null;
        $result->status      = Result::SURVEY_STATUS_CREATED;
        $result->url = $url;
        $result->save();
      }
      return view('survey.home', compact('case_param', 'result', 'base_url'));
    }

    public function show_dummy_survey($lang, $case)
    {
      $result = Result::where('case_number', $case)->first();
      App::setlocale($lang);
      return view('survey.dummy_survey', compact('result'));
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
      $notifiable = false;

      $validated = $request->validated();

      $result = Result::where('case_number', $case)->get()->first();
      $result->question1 = $request->get('rating1');
      $result->question2 = $request->get('rating2');
      $result->question3 = $request->get('rating3');
      $result->question4 = $request->get('rating4');

      $quality = $request->get('quality');

      if( $quality == 'Absolutely' ) {
        $result->question5 = Result::SURVEY_STATUS_TRUE;
      } else {
        $result->question5 = Result::SURVEY_STATUS_FALSE;
      }

      $result->language = $lang;
      $result->feedback = $request->get('feedback');
      $result->status = Result::SURVEY_STATUS_COMPLETED;
      $result->save();

      if($request->get('rating1') <= 3 || $request->get('rating2')  <= 3 || 
       $request->get('rating3') <= 3 ||  $request->get('rating4') <= 3 || 
       $this->checkPoorReviews($request->get('feedback'))) {
        //Notification::route('mail', 'ccs@communitytax.com')->notify(new BadCustomerReview($result));
    }

    return redirect()->route('thanks', [$lang, $case]);
  }

  private function checkPoorReviews($feedback) {
    $blacklistArray = array(
      'BBB',
      'Attorney General', 
      'Complaint', 
      'Refund', 
      'Frustrating', 
      'Rude', 
      'Upset', 
      'Scam', 
      'Liar', 
      'Theft', 
      'Steal',
    );
    $matches = array();
    $matchFound = preg_match_all("/\b(" . implode($blacklistArray,"|") . ")\b/i", $feedback, $matches);
    return $matchFound ? true: false;
  }
}