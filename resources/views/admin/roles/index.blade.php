@extends('layouts.app')
@section('page_heading','Roles')
@section('section')
<link href="{{ asset('css/badge.css') }}" rel="stylesheet" type="text/css">
<div class="form-group">
	<div div class="text-right">
		<a href="{{ route('roles.create') }}" class="btn btn-link" role="button">Create New Role</a>
	</div>
</div>
<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<td>Name</td>
				<td>Created At</td>
				<td>Updated At</td>
				<td>Actions</td>
			</tr>
		</thead>
		<tbody>
			@foreach($roles as $role)
			<tr>
				<td><span class="badge badge-light"> {{ $role->name }} </span></td>
				<td><span class="badge badge-light"> {{$role->created_at}} </span></td>
				<td><span class="badge badge-light"> {{$role->updated_at}} </span></td>
				<td>
					<div class="btn-toolbar" role="toolbar">
						<!-- Button trigger modal -->
						<div class="btn-group mr-2" role="group" aria-label="First group">
							<a href="{{ route('roles.edit',['id' => $role->id]) }}">
								@include('widgets.button_submit', array('class'=>'primary btn-outline', 'size'=>'sm', 'value'=>'Edit'))
							</a>
						</div>
						<div class="btn-group mr-2" role="group" aria-label="Second group">
							<form action="{{ action('Roles\RoleController@destroy', $role->id)}}" method="post">
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
<div class="row justify-content-center">
	{{ $roles->appends(Request::except('page'))->render() }}
</div>
@stop