@extends('layouts.app')
@section('page_heading','Email Reminders')
@section('section')
<link href="{{ asset('css/badge.css') }}" rel="stylesheet" type="text/css">
<style>
table { table-layout: fixed; }
table th, table td { overflow: hidden; word-wrap: break-word; }
</style>
<div class="col-md-12">
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<td>Sent By</td>
					<td>Custom Message</td>
					<td>Created At</td>
					<td>Updated At</td>
					<td>Actions</td>
				</tr>
			</thead>
			<tbody>
				@foreach($reminders as $reminder)
				<tr>
					<td><span class="badge badge-light">{{ $reminder->user->name }}</span></td>

					<td>
						<div>
							{{ $reminder->message }}
						</div>
					</td>
					
					<td><span class="badge badge-light">{{ $reminder->created_at->format('F d, Y') }}</span></td>
					<td><span class="badge badge-light">{{ $reminder->updated_at->format('F d, Y') }}</span></td>

					<td>
						<div class="btn-toolbar" role="toolbar">
							<!-- Button trigger modal -->
							<div class="btn-group mr-2" role="group" aria-label="Second group">
								<form action="{{ action('Reminders\ReminderController@destroy', $reminder->id)}}" method="post">
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
		@if($reminders->count() > 1)
		{!! $reminders->appends(Request::except('page'))->render() !!}
		@endif
	</div>
</div>
@stop