<?php

namespace App\Http\Controllers\Admin;

use App\Models\Result;
use Illuminate\Http\Request;
use App\Exports\ResultExport;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->input('filter');

        if(empty($filter)) {
            $results = Result::orderBy('case_number')->paginate(20);
            return view('admin.dashboard.home', compact('results'));
        } else {
            switch ($filter) {
                case 'en':
                $results = Result::orderBy('case_number')->where('language', 'en')->paginate(20);
                return view('admin.dashboard.home', compact('results'));
                break;

                case 'es':
                $results = Result::orderBy('case_number')->where('language', 'es')->paginate(20);
                return view('admin.dashboard.home', compact('results'));
                break;

                case 'newest':
                $results = Result::orderBy('case_number', 'DESC')->paginate(20);
                return view('admin.dashboard.home', compact('results'));
                break;

                case 'oldest':
                $results = Result::orderBy('case_number', 'ASC')->paginate(20);
                return view('admin.dashboard.home', compact('results'));
                break;
            }
        }
    }

    public function create()
    {
        return view('admin.builder.create');
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
            'lang'        => 'required|string',
        ];

        $this->validate($request, $rules);

        $url = null;
        $case = $request->get('case_number');
        $lang = null;

        if( $request->get('lang') === '1') {
            $url = URL::to('/') . '/welcome/en/case/' . $case;
            $lang = 'en';
        } else {
            $url = URL::to('/') . '/welcome/es/case/' . $case;
            $lang = 'es';
        }

        $result = new Result();
        $result->case_number = $case;
        $result->question1 = 0;
        $result->question2 = 0;
        $result->question3 = 0;
        $result->question4 = 0;
        $result->question5 = Result::SURVEY_STATUS_FALSE;
        $result->language = $lang;
        $result->feedback = null;
        $result->status = Result::SURVEY_STATUS_CREATED;
        $result->url = $url;
        $result->save();

        $results = Result::orderBy('case_number')->paginate(20);

        return view('admin.dashboard.home', compact('results'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Result::find($id);
        return view('admin.dashboard.show', compact('result'));
    }

    public function exportExcel()
    {
        $date = Carbon::now();
        return Excel::download(new ResultExport, 'results_' . $date . '.xlsx');
    }

    public function search(Request $request)
    {
        $search = $request->input('input_search');
        $results = Result::where('case_number', $search)->get();
        return view('admin.dashboard.home', compact('results'));
    }
}