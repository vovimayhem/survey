@extends('layouts.app')
@section('page_heading','Create User')
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
	<form method="POST" action="{{ url('admin/users') }}">
		@csrf

		<div class="form-group">
			<label class="form-label" for="field-1">Name</label>
			<span class="desc"></span>
			<div class="controls">
				<input type="text" class="form-control" name="name">
			</div>
		</div>

		<div class="form-group">
			<label class="form-label" for="field-1">Email</label>
			<span class="desc"></span>
			<div class="controls">
				<input type="text" class="form-control" name="email">
			</div>
		</div>

		<div class="form-group">
			<label class="form-label" for="field-1">Password</label>
			<span class="desc"></span>
			<div class="controls">
				<input type="password" class="form-control" name="password">
			</div>
		</div>

		<div class="form-group">
			<label class="form-label" for="field-1">Confirm Password</label>
			<span class="desc"></span>
			<div class="controls">
				<input type="password" class="form-control" name="password_confirmation">
			</div>
		</div>

		<div class="form-group">
			<label for="sel1">Assign Role</label>
			<select class="form-control" name="select_role">
				@foreach ($roles as $role)
				<option value="{{ $role->id }}">{{ $role->name }}</option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
			<div class="text-right">
				@include('widgets.button_submit', array('class'=>'success btn-outline', 'size'=>'sm', 'value'=>'Create User'))
				@include('widgets.button', array('href'=>"/admin/users", 'class'=>'danger btn-outline', 'size'=>'sm', 'value'=>'Cancel'))
			</div>
		</div>
	</form>
</div>
@stop