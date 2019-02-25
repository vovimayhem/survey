@extends('layouts.app')
@section('page_heading','Survey Details')
@section('section')
<div class="card-header">
	<div class="text-center">
		<h3>Customer Review - Case #: {{ $result->case_number }}</h3>
	</div>
</div>
@if( $result->status === 'Created')
<div class="alert alert-info" role="alert">
	<div class="text-center">
		Status: Survey Created!
	</div>
</div>
@endif

@if( $result->status === 'Incomplete')
<div class="alert alert-warning" role="alert">
	<div class="text-center">
		Status: Survey Incomplete!
	</div>
</div>
@endif

@if( $result->status === 'Completed')
<div class="alert alert-success" role="alert">
	<div class="text-center">
		Status: Survey Completed!
	</div>
</div>
@endif
<div class="text-center">
	<section class="write-review py-5 bg-light" id="write-review">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<hr>
					<div class="row">
						<div class="col-md-6">
							<p>Question 1</p>
						</div>
						<div class="col-md-6 text-warning">
							@if($result->question1 >= 1)
							@for($i = 1; $i <= $result->question1; $i++)
							<i class="fa fa-star"></i>
							@endfor
							@else
							<p style="color:black;"><b>N/A</b></p>
							@endif
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<p>Question 2</p>
						</div>
						<div class="col-md-6 text-warning">
							@if($result->question2 >= 1)
							@for($i = 1; $i <= $result->question2; $i++)
							<i class="fa fa-star"></i>
							@endfor
							@else
							<p style="color:black;"><b>N/A</b></p>
							@endif
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<p>Question 3</p>
						</div>
						<div class="col-md-6 text-warning">
							@if($result->question3 >= 1)
							@for($i = 1; $i <= $result->question3; $i++)
							<i class="fa fa-star"></i>
							@endfor
							@else
							<p style="color:black;"><b>N/A</b></p>
							@endif
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<p>Question 4</p>
						</div>
						<div class="col-md-6 text-warning">
							@if($result->question4 >= 1)
							@for($i = 1; $i <= $result->question4; $i++)
							<i class="fa fa-star"></i>
							@endfor
							@else
							<p style="color:black;"><b>N/A</b></p>
							@endif
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<p>Question 5</p>
						</div>
						<div class="col-md-6 text-warning">
							@if(empty($result->question5))
							<p style="color:black;"><b>N/A</b></p>
							@else
							@if($result->question5 === 'True')
							<p><b>@lang('survey.absolutely')</b></p>
							@else
							<p><b>@lang('survey.unfortunately_not')</b></p>
							@endif
							@endif
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-6">
							<p>Actions</p>
						</div>
						<div class="col-md-6 text-warning">
							<p>
								<a href="{{ route('dummy.survey', [ 'lang' => $result->language, 'case' => $result->case_number]) }}">
									View Survey
								</a>
							</p>

							<p>
								<a href="https://ctr.logics.com/Cases/Case.aspx?CaseID={{ $result->case_number }}">Open case in Logics</a>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-8 my-5 py-5">
					@if(empty($result->feedback))
					<h3>Feedback</h3>
					<p style="color:black;">N/A</p>
					@else
					<h3>Feedback</h3>
					<p>{{ $result->feedback }}</p>
					@endif
					<p>Link: <a href="{{ $result->url }}">{{ $result->url }}</a></p>
				</div>
			</div>
		</div>
	</section>

	<div class="form-group">
		<a href="{!! URL::previous() !!}" class="btn btn-primary btn-md btn-block" role="button" aria-pressed="true">Go Back</a>
	</div>
</div>
@stop