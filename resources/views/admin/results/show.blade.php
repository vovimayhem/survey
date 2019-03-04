@extends('layouts.app')
@section('page_heading','Survey Details')
@section('section')
<link href="{{ asset('css/zebra_tooltips.min.css') }}" rel="stylesheet" type="text/css">

<div class="col-lg-8">
	@section ('pane2_panel_title', 'Most Recent Surveys')
	@section ('pane2_panel_body')

	<div class="card-header">
		<div class="text-center">
			<h3>Customer Review - Case #: {{ $result->case_number }}</h3>
		</div>
	</div>
	@if( $result->survey_status === 'Created')
	<div class="alert alert-info" role="alert">
		<div class="text-center">
			Status: Survey Created!
		</div>
	</div>
	@endif

	@if( $result->survey_status === 'Incomplete')
	<div class="alert alert-warning" role="alert">
		<div class="text-center">
			Status: Survey Incomplete!
		</div>
	</div>
	@endif

	@if( $result->survey_status === 'Completed')
	<div class="alert alert-success" role="alert">
		<div class="text-center">
			Status: Survey Completed!
		</div>
	</div>
	@endif

	<div class="text-center">
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
	@endsection
	@include('widgets.panel', array('header'=>true, 'as'=>'pane2'))
</div>

<!-- /.col-lg-8 -->
<div class="col-lg-4">
	@section ('pane1_panel_title', 'Notes Panel')
	@section ('pane1_panel_body')

	<div class="list-group">
		<a class="btn btn-default btn-block" data-toggle="modal" data-target="#noteModal">Add Note</a>
		@foreach($notes as $note)
		<a href="#" class="list-group-item">
			<i class="fa fa-edit fa-fw"></i> 
			{{ $note->comment }}
			<span class="pull-right text-muted small"><em>{{ $note->updated_at->diffForHumans() }}</em>
			</span>
		</a>
		@endforeach
	</div> 

	@if(!$notes->isEmpty())
	<a href="{{ route('notes.show.all', $result->id) }}" class="btn btn-default btn-block">View All Notes</a>
	@endif

	<!-- /.panel-body -->
	@endsection
	@include('widgets.panel', array('header'=>true, 'as'=>'pane1'))
</div>

<!-- Modal Dialog -->
<div class="modal fade" id="noteModal" tabindex="-1" role="dialog" ara-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form method="POST" action="{{ url('admin/notes') }}">
			@csrf
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">New Note</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="message-text" class="col-form-label">Comment:</label>
						<textarea class="form-control" id="message-text" name="comment" rows="8" cols="50" style="resize: none;"></textarea>

						<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
						<input type="hidden" name="result_id" value="{{ $result->id }}" />
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save Note</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/zebra_pin@2.0.0/dist/zebra_pin.min.js"></script>
<script src="{{ asset('js/zebra_tooltips.min.js') }}" defer></script>
<script type="text/javascript">
	$(document).ready(function() {
		new $.Zebra_Tooltips($('.zebra_tooltips_custom_width_more'), {
			max_width: 425
		});
	});
</script>
@stop