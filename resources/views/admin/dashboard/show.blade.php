@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">Information</div>
				<div class="card-body">
					<center> 
						<h2>Case # {{ $result->case_number }}</h2> 
						<p>Value response 1 = {{ $result->question1 }}</p> 
						<p>Value response 2 = {{ $result->question2 }}</p> 
						<p>Value response 3 = {{ $result->question3 }}</p> 
						<p>Value response 4 = {{ $result->question4 }}</p> 

						@if($result->question5 == true)
						<p>Value response 5 = True</p> 
						@else
						<p>Value response 5 = False</p> 
						@endif

						<p>Feedback - {{ $result->feedback }}</p> 

						<p>Link <a href="{{ $result->url }}"> {{ $result->url }} </a></p> 

						<a href="{{ url('/admin') }}" class="btn btn-primary">Back</a>
					</center>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
