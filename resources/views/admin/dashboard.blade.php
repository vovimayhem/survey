@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="form-group">
				<div class="text-right">
					<a href="{{ route('export') }}" class="btn btn-primary">Export Data</a>
				</div>
			</div>
			<div class="card">
				<div class="card-header">Survey results</div>
				<div class="card-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<td>Case #</td>
								<td>Q1</td>
								<td>Q2</td>
								<td>Q3</td>
								<td>Q4</td>
								<td>Q5</td>
								<td>Language</td>
								<td>Feedback</td>
								<td>Created At</td>
							</tr>
						</thead>
						<tbody>
							@foreach($results as $result)
							<tr>
								<td><a href="{{ url('/result/show', $result->id)}}"> {{ $result->case_number }}</a></td>
								<td>{{$result->question1}}</td>
								<td>{{$result->question2}}</td>
								<td>{{$result->question3}}</td>
								<td>{{$result->question4}}</td>

								@if($result->question5 == true)
								<td>true</td>
								@else
								<td>false</td>
								@endif

								@if($result->language == 'es')
								<td>Spanish</td>
								@else
								<td>English</td>
								@endif

								<td>{{$result->feedback}}</td>
								<td>{{ $result->created_at->format('F d, Y') }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
