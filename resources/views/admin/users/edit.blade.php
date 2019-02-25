@extends('layouts.app')
@section('page_heading','Edit User')
@section('section')
@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<form action="{{url('admin/users', [$user->id])}}" method="POST">
	<input type="hidden" name="_method" value="PUT">
	@csrf

	<div class="form-group">
		<label class="form-label" for="field-1">Name</label>
		<span class="desc"></span>
		<div class="controls">
			<input type="text" class="form-control" name="name" value="{{ $user->name }}">
		</div>
	</div>

	<div class="form-group">
		<label class="form-label" for="field-1">Email</label>
		<span class="desc"></span>
		<div class="controls">
			<input type="text" class="form-control" name="email" value="{{ $user->email }}">
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
			@if(!empty($user->roles->first()->id) && $user->roles->first()->id === $role->id)
			<option value="{{ $role->id }}" selected>{{ $role->name }}</option>
			@else
			<option value="{{ $role->id }}">{{ $role->name }}</option>
			@endif
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<div class="text-right">
			@include('widgets.button_submit', array('class'=>'success btn-outline', 'size'=>'sm', 'value'=>'Update User'))
			@include('widgets.button', array('href'=>"/admin/users", 'class'=>'danger btn-outline', 'size'=>'sm', 'value'=>'Cancel'))
		</div>
	</div>
</form>
@stop