@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="card-header">
						<div class="text-center">
							<h3>Users</h3>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="form-group">
						<div div class="text-right">
							<a href="{{ route('users.create') }}" class="btn btn-link" role="button">Create New User</a>
						</div>
					</div>
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
								<td>{{$user->name}}</td>
								<td>{{$user->email}}</td>
								<td>{{ '[ ' . $user->roles()->pluck('name')->implode(' , ') . ' ]' }}</td>
								<td>
									<div class="btn-toolbar" role="toolbar">
										<!-- Button trigger modal -->
										<div class="btn-group mr-2" role="group" aria-label="First group">
											<a href="{{ route('users.edit',['id' => $user->id]) }}">
												<button class="btn btn-outline-primary btn-sm">Edit</button>
											</a>
										</div>
										<div class="btn-group mr-2" role="group" aria-label="Second group">
											<form action="{{ action('Users\UserController@destroy', $user->id)}}" method="post">
												@csrf
												<input name="_method" type="hidden" value="DELETE">
												<button class="btn btn-outline-danger btn-sm" type="submit">Delete</button>
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
		</div>
	</div>
</div>
<div class="row justify-content-center">
	{{ $users->appends(Request::except('page'))->render() }}
</div>
@endsection
