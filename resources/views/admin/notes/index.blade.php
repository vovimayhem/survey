@extends('layouts.app')
@section('page_heading','Notes')
@section('section')
<link href="{{ asset('css/badge.css') }}" rel="stylesheet" type="text/css">
<div class="col-md-12">
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<td>Author</td>
					<td>Case #</td>
					<td>Comment</td>
					<td>Created At</td>
					<td>Updated At</td>
					<td>Actions</td>
				</tr>
			</thead>
			<tbody>
				@foreach($notes as $note)
				<tr>
					<td><span class="badge badge-light">{{ $note->user->name }}</span></td>

					<td>
						<a href="{{ route('surveys.show', $note->result_id) }}">{{ $note->result->case_number }}</a>
					</td>

					<td>
						<div>
							{{ $note->comment }}
						</div>
					</td>

					<td><span class="badge badge-light">{{ $note->created_at->format('F d, Y') }}</span></td>
					<td><span class="badge badge-light">{{ $note->updated_at->format('F d, Y') }}</span></td>

					<td>
						<div class="btn-toolbar" role="toolbar">
							<!-- Button trigger modal -->
							<div class="btn-group mr-2" role="group" aria-label="First group">
								<a href="{{ route('notes.edit',['id' => $note->id]) }}">
									@include('widgets.button_submit', array('class'=>'primary btn-outline', 'size'=>'sm', 'value'=>'Edit'))
								</a>
							</div>
							<div class="btn-group mr-2" role="group" aria-label="Second group">
								<form action="{{ action('Notes\NoteController@destroy', $note->id)}}" method="post">
									@csrf
									<input name="_method" type="hidden" value="DELETE">
									@include('widgets.button_submit', array('class'=>'danger btn-outline', 'size'=>'sm', 'value'=>'Delete'))
								</form>
							</div>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<div class="text-center">
		@if($notes->count() > 1)
		{!! $notes->appends(Request::except('page'))->render() !!}
		@endif
	</div>
</div>
@stop