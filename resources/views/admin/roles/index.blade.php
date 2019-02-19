@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="card-header">
						<div class="text-center">
							<h3>Roles</h3>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="form-group">
						<div div class="text-right">
							<a href="{{ route('roles.create') }}" class="btn btn-link" role="button">Create New Role</a>
						</div>
					</div>
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
								<td>{{$role->name}}</td>
								<td>{{$role->created_at}}</td>
								<td>{{$role->updated_at}}</td>
								<td>
									<div class="btn-toolbar" role="toolbar">
										<!-- Button trigger modal -->
										<div class="btn-group mr-2" role="group" aria-label="First group">
											<a href="{{ route('roles.edit',['id' => $role->id]) }}">
												<button class="btn btn-outline-primary btn-sm">Edit</button>
											</a>
										</div>
										<div class="btn-group mr-2" role="group" aria-label="Second group">
											<form action="{{ action('Roles\RoleController@destroy', $role->id)}}" method="post">
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
	{{ $roles->appends(Request::except('page'))->render() }}
</div>
@endsection
