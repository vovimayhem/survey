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
					<table class="table table-striped">
						<thead>
							<tr>
								<td>Id</td>
								<td>Name</td>
								<td>Created At</td>
								<td>Updated At</td>
								<td>Actions</td>
							</tr>
						</thead>
						<tbody>
							@foreach($roles as $role)
							<tr>
								<td>{{$role->id}}</td>
								<td>{{$role->name}}</td>
								<td>{{$role->created_at}}</td>
								<td>{{$role->updated_at}}</td>
								<td>
									<a href="{{ url('admin/roles/' . ['id' => $role->id] . 'edit') }}">
										<button class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></button>
									</a>
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
