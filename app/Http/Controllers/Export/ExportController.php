<?php

namespace App\Http\Controllers\Export;

use App\Exports\ResultExport;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
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

    public function exportExcel()
    {
        $date = Carbon::now();
        return Excel::download(new ResultExport, 'results_' . $date . '.xlsx');
    }
}