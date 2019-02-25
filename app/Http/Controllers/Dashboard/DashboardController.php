<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Result;
use Illuminate\Http\Request;
use App\Exports\ResultExport;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
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
        //$this->middleware('auth', ['except' => ['show']] );
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $num_created    = Result::where('status', 'Created')->count();
        $num_completed  = Result::where('status', 'Completed')->count();
        $num_incomplete = Result::where('status', 'Incomplete')->count();

        JavaScriptFacade::put([
            'created'    => $num_created,
            'completed'  => $num_completed,
            'incomplete' => $num_incomplete
        ]);

        $results = Result::orderBy('updated_at', 'DESC')->paginate(15);

        $surveys = Result::all()->count();
        $roles   = Role::all()->count();
        $users   = User::all()->count();

        return view('admin.dashboard.home', compact('results', 'surveys', 'roles', 'users'));
    }
}