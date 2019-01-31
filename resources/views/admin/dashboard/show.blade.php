@extends('layouts.app')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="text-center">
						<h3>Customer Review</h3>
					</div>
				</div>
				<div class="card-body">
					<div class="text-center">
						<section class="write-review py-5 bg-light" id="write-review">
							<div class="container">
								<div class="row">
									<div class="col-md-4">
										<div class="row">
											<div class="col-md-6">
												<h5>Customer coming back?</h5>
											</div>
											<div class="col-md-6">
												@if($result->question5 === 'True')
												<h3>YES</h3>
												@else
												<h3>NO</h3>
												@endif
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-md-6">
												<p>Question 1</p>
											</div>
											<div class="col-md-6 text-warning">
												@for($i = 1; $i <= $result->question1; $i++)
												<i class="fa fa-star"></i>
												@endfor
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<p>Question 2</p>
											</div>
											<div class="col-md-6 text-warning">
												@for($i = 1; $i <= $result->question2; $i++)
												<i class="fa fa-star"></i>
												@endfor
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<p>Question 3</p>
											</div>
											<div class="col-md-6 text-warning">
												@for($i = 1; $i <= $result->question3; $i++)
												<i class="fa fa-star"></i>
												@endfor
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<p>Question 4</p>
											</div>
											<div class="col-md-6 text-warning">
												@for($i = 1; $i <= $result->question4; $i++)
												<i class="fa fa-star"></i>
												@endfor
											</div>
										</div>
									</div>
									<div class="col-md-8 my-5 py-5">
										<h3>Feedback</h3>
										<p>{{ $result->feedback }}</p>
										<a href="{{ $result->url }}">{{ $result->url }}</a>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
@endsection
