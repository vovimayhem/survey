<?php

namespace App\Http\Controllers\Reminders;

use App\Models\Result;
use GuzzleHttp\Client;
use App\Models\Reminder;
use App\Mail\SurveyReminder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ReminderController extends Controller
{

    public function __construct() 
    {
        //Basic Auth middleware and prevent BackHistory
        $this->middleware(['auth', 'preventBackHistory']);

        //Only Admin Middleware
        $this->middleware('isAdmin', ['only' => ['index', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id'   => 'required|integer',
            'result_id' => 'required|integer',  
            'message'   => 'required'
        ]);

        $reminder = new Reminder();
        $reminder->user_id   = $request->get('user_id');
        $reminder->result_id = $request->get('result_id');
        $reminder->message   = $request->get('message');
        $reminder->save();

        $notification = array(
            'message' => 'The email has been sent it successfully!', 
            'alert-type' => 'success'
        );

        //Http client
        $client = new Client(['headers' => ['ns-token' => 'AAAAUf62Amk']]);
        $response = $client->request('GET', 'https://ctaxalert.com/api/?caseid=' . $request->get('case_number'));

        //Get Json 
        $json = $response->getBody()->getContents();

        //Get user data
        $name    = json_decode($json)->FullName;
        $email   = json_decode($json)->Email;
        $result  = Result::find($request->get('result_id'));
        $message = $request->get('message');

        Mail::to('anhernandez@communitytax.com')->send(new SurveyReminder($name, $result, $message));

        return redirect()->route('surveys.show', $request->get('result_id'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reminder $reminder)
    {
        //
    }
}
