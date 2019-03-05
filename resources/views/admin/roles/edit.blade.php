@extends('layouts.app')
@section('page_heading','Edit Role')
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
	<form action="{{url('admin/roles', [$role->id])}}" method="POST">
		<input type="hidden" name="_method" value="PUT">
		@csrf
		<div class="form-group">
			<label class="form-label" for="field-1">Role Name</label>
			<span class="desc"></span>
			<div class="controls">
				<input type="text" class="form-control" name="name" value="{{ $role->name }}">
			</div>
		</div>

		<div class="form-group">
			<div class="text-right">
				@include('widgets.button_submit', array('class'=>'success btn-outline', 'size'=>'sm', 'value'=>'Update Role'))
				@include('widgets.button', array('href'=>"/admin/roles", 'class'=>'danger btn-outline', 'size'=>'sm', 'value'=>'Cancel'))
			</div>
		</div>
	</form>
</div>
@stop