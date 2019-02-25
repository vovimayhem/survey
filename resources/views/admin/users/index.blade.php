@extends('layouts.app')
@section('page_heading','Users')
@section('section')
<link href="{{ asset('css/badge.css') }}" rel="stylesheet" type="text/css">
<div class="col-md-12">
	<div class="form-group">
		<div div class="text-right">
			<a href="{{ route('users.create') }}" class="btn btn-link" role="button">Create New User</a>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<td>Name</td>
					<td>Email</td>
					<td>Role</td>
					<td>Actions</td>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<td><span class="badge badge-light"> {{ $user->name }} </span></td>
					<td><span class="badge badge-light"> {{ $user->email }} </span></td>
					<td><span class="badge badge-light">{{ '[ ' . $user->roles()->pluck('name')->implode(' , ') . ' ]' }}</span></td>
					<td>
						<div class="btn-toolbar" role="toolbar">
							<!-- Button trigger modal -->
							<div class="btn-group mr-2" role="group" aria-label="First group">
								<a href="{{ route('users.edit',['id' => $user->id]) }}">
									@include('widgets.button_submit', array('class'=>'primary btn-outline', 'size'=>'sm', 'value'=>'Edit'))
								</a>
							</div>
							<div class="btn-group mr-2" role="group" aria-label="Second group">
								<form action="{{ action('Users\UserController@destroy', $user->id)}}" method="post">
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
</div> 
<div class="form-group">
	<div class="text-center">
		{{ $users->appends(Request::except('page'))->render() }}
	</div>  
</div>   
@stop
