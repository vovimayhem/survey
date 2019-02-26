<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Result;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Laracasts\Utilities\JavaScript\JavaScriptFacade;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'preventBackHistory']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $num_created    = Result::where('survey_status', 'Created')->count();
        $num_completed  = Result::where('survey_status', 'Completed')->count();
        $num_incomplete = Result::where('survey_status', 'Incomplete')->count();

        $num_positives = Result::where('survey_review', 'positive')->count();
        $num_negatives = Result::where('survey_review', 'negative')->count();

        JavaScriptFacade::put([
            'created'    => $num_created,
            'completed'  => $num_completed,
            'incomplete' => $num_incomplete,
            'positives'  => $num_positives,
            'negatives'  => $num_negatives
        ]);

        $results = Result::where('survey_status', '!=', 'Created')->orderBy('updated_at', 'DESC')->paginate(15);

        $surveys = Result::all()->count();
        $roles   = Role::all()->count();
        $users   = User::all()->count();

        return view('admin.dashboard.home', compact('results', 'surveys', 'roles', 'users'));
    }
}