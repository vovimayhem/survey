@extends('layouts.app')
@section('page_heading','Dashboard')
@section('section')
<link href="{{ asset('css/badge.css') }}" rel="stylesheet">
<link href="{{ asset('css/zebra_tooltips.min.css') }}" rel="stylesheet" type="text/css">

<!-- /.row -->
<div class="col-sm-12">
	<div class="row">
		<div class="col-lg-3 col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-file-o fa-5x"></i>
						</div>
						<div class="col-xs-9 text-right">
							<div class="huge">{{ $surveys }}</div>
							<div>Surveys</div>
						</div>
					</div>
				</div>
				<a href="{{ route('surveys.index') }}">
					<div class="panel-footer">
						<span class="pull-left">View Details</span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="panel panel-green">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-gears fa-5x"></i>
						</div>
						<div class="col-xs-9 text-right">
							<div class="huge">{{ $roles }}</div>
							<div>Roles</div>
						</div>
					</div>
				</div>
				<a href="{{ route('roles.index') }}">
					<div class="panel-footer">
						<span class="pull-left">View Details</span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="panel panel-yellow">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-users fa-5x"></i>
						</div>
						<div class="col-xs-9 text-right">
							<div class="huge">{{ $users }}</div>
							<div>Users</div>
						</div>
					</div>
				</div>
				<a href="{{ route('users.index') }}">
					<div class="panel-footer">
						<span class="pull-left">View Details</span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="panel panel-red">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-book fa-5x"></i>
						</div>
						<div class="col-xs-9 text-right">
							<div class="huge">0</div>
							<div>Notes</div>
						</div>
					</div>
				</div>
				<a href="">
					<div class="panel-footer">
						<span class="pull-left">View Details</span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-8">
			@section ('pane2_panel_title', 'Most Recent Surveys')
			@section ('pane2_panel_body')
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<td>Case #</td>
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
							<td><a href="{{ route('surveys.show', $result->id)}}"> {{ $result->case_number }}</a></td>

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
			@endsection
			@include('widgets.panel', array('header'=>true, 'as'=>'pane2'))
		</div>
		<!-- /.col-lg-8 -->
		<div class="col-lg-4">
			@section ('panel1_panel_title', 'Survey Status Chart')
			@section ('panel1_panel_body')

			<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
			<canvas id="myChart" width="400" height="345"></canvas>
			<script>
				new Chart(document.getElementById("myChart"),
				{
					"type":"doughnut",
					"data": { "labels": [ "Created", "Completed", "Incomplete" ],
					"datasets":[ 
					{ 
						"data": [ created, completed, incomplete ],
						"backgroundColor": [ "rgb(51,122,183)", "rgb(92,184,92)", "rgb(240,173,78)" ] 
					}]}
				});
			</script>
			@endsection
			@include('widgets.panel', array('header'=>true, 'as'=>'panel1'))

			@section ('pane1_panel_title', 'Notes Panel')
			@section ('pane1_panel_body')
			
			
			<div class="list-group">
				<a href="#" class="list-group-item">
					<i class="fa fa-comment fa-fw"></i> New Comment
					<span class="pull-right text-muted small"><em>4 minutes ago</em>
					</span>
				</a>
				<a href="#" class="list-group-item">
					<i class="fa fa-twitter fa-fw"></i> 3 New Followers
					<span class="pull-right text-muted small"><em>12 minutes ago</em>
					</span>
				</a>
				<a href="#" class="list-group-item">
					<i class="fa fa-envelope fa-fw"></i> Message Sent
					<span class="pull-right text-muted small"><em>27 minutes ago</em>
					</span>
				</a>
				<a href="#" class="list-group-item">
					<i class="fa fa-tasks fa-fw"></i> New Task
					<span class="pull-right text-muted small"><em>43 minutes ago</em>
					</span>
				</a>
				<a href="#" class="list-group-item">
					<i class="fa fa-upload fa-fw"></i> Server Rebooted
					<span class="pull-right text-muted small"><em>11:32 AM</em>
					</span>
				</a>
				<a href="#" class="list-group-item">
					<i class="fa fa-bolt fa-fw"></i> Server Crashed!
					<span class="pull-right text-muted small"><em>11:13 AM</em>
					</span>
				</a>
				<a href="#" class="list-group-item">
					<i class="fa fa-warning fa-fw"></i> Server Not Responding
					<span class="pull-right text-muted small"><em>10:57 AM</em>
					</span>
				</a>
				<a href="#" class="list-group-item">
					<i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
					<span class="pull-right text-muted small"><em>9:49 AM</em>
					</span>
				</a>
				<a href="#" class="list-group-item">
					<i class="fa fa-money fa-fw"></i> Payment Received
					<span class="pull-right text-muted small"><em>Yesterday</em>
					</span>
				</a>
			</div>
			<!-- /.list-group -->
			<a href="#" class="btn btn-default btn-block">View All Notes</a>
			
			<!-- /.panel-body -->
			
			@endsection
			@include('widgets.panel', array('header'=>true, 'as'=>'pane1'))
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
		@stop