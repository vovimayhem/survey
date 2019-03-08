<?php

namespace App\Http\Controllers\Search;

use App\Models\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
	public function __construct() {
		$this->middleware(['auth', 'preventBackHistory']);
	}

	public function searchResults($q) {
		$results = Result::where('case_number', $q)->get();
		return view('search.index', compact('results'));
	}

	public function searchByCaseNumber(Request $request) {
		try {
			$case = $request->input('q');
			$results = Result::where('case_number', $case)->get();

			$notificationEmptyResult = array(
				'message' => 'Case ' . $case . ' not found!', 
				'alert-type' => 'warning'
			);

			$notificationResult = array(
				'message' => 'Case ' . $case . ' found!', 
				'alert-type' => 'success'
			);

			$notificationError = array(
				'message' => 'Opps something went wrong!', 
				'alert-type' => 'error'
			);

			if($results->isEmpty()) {
				return redirect()->route('survey.search.results', $case)->with($notificationEmptyResult);
			} else {
				return redirect()->route('survey.search.results', $case)->with($notificationResult);
			}
		} catch(\Exception $e) {
			return redirect()->route('survey.search.results', 'error')->with($notificationError);
		}
	}
}