<?php

namespace App\Http\Controllers\Admin;

use App\Models\Result;
use Illuminate\Http\Request;
use App\Exports\ResultExport;
use Illuminate\Support\Carbon;
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
        $case = $request->get('case');
        $lang = $request->get('lang');

        if( $request->get('lang') === 'English') {
            $url = 'http://127.0.0.1:8000/welcome/en/case/' . $case;
        } else {
            $url = 'http://127.0.0.1:8000/welcome/es/case/' . $case;
        }

        $result = new Result();
        $result->question1 = 0;
        $result->question2 = 0;
        $result->question3 = 0;
        $result->question4 = 0;
        $result->question5 = '0';
        $result->language = $lang;
        $result->feedback = null
        $result->status = '0';
        $result->url = $url;
        $result->save();

        return redirect()->url('/admin');
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