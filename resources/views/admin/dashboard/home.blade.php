@extends('layouts.app')

<link href="{{ asset('css/zebra_tooltips.min.css') }}" rel="stylesheet" type="text/css">

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="box-body">
				<div class="form-group">
					Filters:
					<a href="/admin?filter=en">English</a> |
					<a href="/admin?filter=es">Spanish</a> |
					<a href="/admin?filter=newest">Newest</a> |
					<a href="/admin?filter=oldest">Oldest</a> |
					<a href="/admin">Clear</a> |
				</div>

				<div class="form-group">
					<form action="{{ route('search') }}" method="get" class="form-inline">
						<div class="form-group">
							<input type="text" class="form-control" name="input_search" placeholder="Case #">
						</div>

						<div class="form-group" align="rigth">
							<button class="btn btn-primary" type="submit">Search</button>
						</div>
					</form>
				</div>
			</div>
			
			<div class="card">
				<div class="card-header">
					<div class="card-header">
						<div class="text-center">
							<h3>Survey results</h3>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
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
									<td>Status</td>
									<td>Created At</td>
									<td>Updated At</td>
								</tr>
							</thead>
							<tbody>
								@foreach($results as $result)
								<tr>
									<td><a href="{{ url('admin/result/show', $result->id)}}"> {{ $result->case_number }}</a></td>

									<td>
										@if($result->question1 < 1)
										<p>N/A</p>
										@else
										<span class="badge badge-light"> {{ $result->question1 }} </span>
										@endif
									</td>

									<td>
										@if($result->question2 < 1)
										<p>N/A</p>
										@else
										<span class="badge badge-light"> {{ $result->question2 }} </span>
										@endif
									</td>

									<td>
										@if($result->question3 < 1)
										<p>N/A</p>
										@else
										<span class="badge badge-light"> {{ $result->question3 }} </span>
										@endif
									</td>

									<td>
										@if($result->question4 < 1)
										<p>N/A</p>
										@else
										<span class="badge badge-light"> {{ $result->question4 }} </span>
										@endif
									</td>

									@if($result->question5 == 'True')
									<td><span class="badge badge-light">@lang('survey.absolutely')</span></td>
									@else
									<td><span class="badge badge-light">@lang('survey.unfortunately_not')</span></td>
									@endif

									@if($result->language == 'es')
									<td><span class="badge badge-light">Spanish</span></td>
									@else
									<td><span class="badge badge-light">English</span></td>
									@endif

									<td>
										@if(empty($result->feedback))
										<p>N/A</p>
										@else
										<p>
											<a 
											href="javascript: void(0)"
											class="zebra_tooltips_custom_width_more" 
											title=" {{ str_limit($result->feedback, $limit = 150, $end = '...') }}">Show</a>
										</p>
										@endif
									</td>

									<td>
										@if( $result->status === 'Created')
										<span class="badge badge-primary">Created</span>
										@endif

										@if( $result->status === 'Completed')
										<span class="badge badge-success">Completed</span>
										@endif

										@if( $result->status === 'Incomplete')
										<span class="badge badge-warning">Incomplete</span>
										@endif
									</td>
									<td><span class="badge badge-light">{{ $result->created_at->format('F d, Y') }}</span></td>
									<td><span class="badge badge-light">{{ $result->updated_at->format('F d, Y') }}</span></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row justify-content-center">
	@if($results->count() > 1)
	{!! $results->appends(Request::except('page'))->render() !!}
	@endif
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/zebra_pin@2.0.0/dist/zebra_pin.min.js"></script>
<script src="{{ asset('js/zebra_tooltips.min.js') }}" defer></script>
<script type="text/javascript">
	$(document).ready(function() {
		new $.Zebra_Tooltips($('.zebra_tooltips_custom_width_more'), {
			max_width: 425
		});
	});
</script>
@endsection