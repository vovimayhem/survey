@extends('layouts.app')
@section('page_heading','Search results')
@section('section')
<link href="{{ asset('css/zebra_tooltips.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/badge.css') }}" rel="stylesheet" type="text/css">
<div class="col-md-12">
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<td>Case #</td>
					<td>Q1</td>
					<td>Q2</td>
					<td>Q3</td>
					<td>Q4</td>
					<td>Q5</td>
					<td>Language</td>
					<td>Notes</td>
					<td>Feedback</td>
					<td>Status</td>
					<td>Created At</td>
					<td>Updated At</td>
				</tr>
			</thead>
			<tbody>
				@foreach($results as $result)
				<tr>
					<td><a href="{{ route('surveys.show', $result->id)}}"> {{ $result->case_number }}</a></td>

					<td>
						@if($result->question1 < 1)
						<span class="badge badge-light">N/A</span>
						@else
						<span class="badge badge-light"> {{ $result->question1 }} </span>
						@endif
					</td>

					<td>
						@if($result->question2 < 1)
						<span class="badge badge-light">N/A</span>
						@else
						<span class="badge badge-light"> {{ $result->question2 }} </span>
						@endif
					</td>

					<td>
						@if($result->question3 < 1)
						<span class="badge badge-light">N/A</span>
						@else
						<span class="badge badge-light"> {{ $result->question3 }} </span>
						@endif
					</td>

					<td>
						@if($result->question4 < 1)
						<span class="badge badge-light">N/A</span>
						@else
						<span class="badge badge-light"> {{ $result->question4 }} </span>
						@endif
					</td>

					@if(empty($result->question5))
					<td><span class="badge badge-light">N/A</span></td>
					@else
					@if($result->question5 === 'True')
					<td><span class="badge badge-light">@lang('survey.absolutely')</span></td>
					@else
					<td><span class="badge badge-light">@lang('survey.unfortunately_not')</span></td>
					@endif
					@endif

					@if($result->language == 'es')
					<td><span class="badge badge-light">Spanish</span></td>
					@else
					<td><span class="badge badge-light">English</span></td>
					@endif

					<td>
						@if($result->notes->count() === 0)
						<p>N/A</p>
						@else
						<?php
						$singleValue = null;
						$hoverNotes = null;
						$arrNotes = array();
						$arrResult = array();

						foreach($result->notes()->orderBy('created_at', 'DESC')->get()->take(10) as $note) {
							$noteArray = ["author" => $note->user->name,"comment" => $note->comment,"date" => $note->created_at];
							array_push($arrNotes, $noteArray);
						}

						foreach ($arrNotes as $value) {
							$singleValue = nl2br('Entered by: ' . 
								$value['author'] . ' on ' . 
								$value['date']->format('F d, Y') . "\n" .  
								$value['comment'] . "\n" . "\n");
							array_push($arrResult, $singleValue);
						}

						foreach($arrResult as $finalValue) {
							$hoverNotes .= $finalValue;
						}
						?>
						<p>
							<a 
							href="javascript: void(0)"
							class="zebra_tooltips_custom_width_more" 
							title="{{ $hoverNotes }}"> {{ $result->notes->count() }}</a>
						</p>
						@endif
					</td>

					<td>
						@if(empty($result->feedback))
						<p>N/A</p>
						@else
						<p>
							<a 
							href="javascript: void(0)"
							class="zebra_tooltips_custom_width_more" 
							title=" {{ str_limit($result->feedback, $limit = 150, $end = '...') }}">Show</a>
						</p>
						@endif
					</td>

					<td>
						@if( $result->survey_status === 'Created')
						<span class="badge badge-primary">Created</span>
						@endif

						@if( $result->survey_status === 'Completed')
						<span class="badge badge-success">Completed</span>
						@endif

						@if( $result->survey_status === 'Incomplete')
						<span class="badge badge-warning">Incomplete</span>
						@endif
					</td>
					<td><span class="badge badge-light">{{ $result->created_at->format('F d, Y') }}</span></td>
					<td><span class="badge badge-light">{{ $result->updated_at->format('F d, Y') }}</span></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<div class="text-center">
		@if($results->count() > 1)
		{!! $results->appends(Request::except('page'))->render() !!}
		@endif
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/zebra_pin@2.0.0/dist/zebra_pin.min.js"></script>
<script src="{{ asset('js/zebra_tooltips.min.js') }}" defer></script>
<script type="text/javascript">
	$(document).ready(function() {
		new $.Zebra_Tooltips($('.zebra_tooltips_custom_width_more'), {
			max_width: 500
		});
	});
</script>
@stop