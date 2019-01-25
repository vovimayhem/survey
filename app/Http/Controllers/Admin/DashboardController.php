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
            return view('admin.dashboard', compact('results'));
        } else {
            switch ($filter) {
                case 'en':
                $results = Result::orderBy('case_number')->where('language', 'en')->paginate(20);
                return view('admin.dashboard', compact('results'));
                break;

                case 'es':
                $results = Result::orderBy('case_number')->where('language', 'es')->paginate(20);
                return view('admin.dashboard', compact('results'));
                break;

                case 'newest':
                $results = Result::orderBy('case_number', 'DESC')->paginate(20);
                return view('admin.dashboard', compact('results'));
                break;

                case 'oldest':
                $results = Result::orderBy('case_number', 'ASC')->paginate(20);
                return view('admin.dashboard', compact('results'));
                break;
            }
        }
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
        return view('admin.show', compact('result'));
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
        return view('admin.dashboard', compact('results'));
    }
}