@extends('layouts.app')
@section('page_heading', 'Case #: ' . $result->case_number . ' - Notes' )
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
					<td>Author</td>
					<td>Comment</td>
					<td>Created At</td>
					<td>Updated At</td>
				</tr>
			</thead>
			<tbody>
				@foreach($notes as $note)
				<tr>
					<td><span class="badge badge-light">{{ $note->user->name }}</span></td>
					<td>
						<div>
							{{ $note->comment }}
						</div>
					</td>
					<td><span class="badge badge-light">{{ $note->created_at->format('F d, Y') }}</span></td>
					<td><span class="badge badge-light">{{ $note->updated_at->format('F d, Y') }}</span></td>
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