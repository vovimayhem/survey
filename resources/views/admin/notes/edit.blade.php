@extends('layouts.app')
@section('page_heading','Edit Note')
@section('section')
<div class="col-md-12">
	@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<form action="{{url('admin/notes', [$note->id])}}" method="POST">
		<input type="hidden" name="_method" value="PUT">
		@csrf
		<div class="form-group">
			<label class="form-label" for="field-1">Comment</label>
			<span class="desc"></span>
			<div class="controls">
				<textarea class="form-control" id="message-text" name="comment" rows="8" cols="50" style="resize: none;">{{ $note->comment }}</textarea>
			</div>
		</div>

		<div class="form-group">
			<div class="text-right">
				@include('widgets.button_submit', array('class'=>'success btn-outline', 'size'=>'sm', 'value'=>'Update Note'))
				@include('widgets.button', array('href'=>"/admin/notes", 'class'=>'danger btn-outline', 'size'=>'sm', 'value'=>'Cancel'))
			</div>
		</div>
	</form>
</div>
@stop