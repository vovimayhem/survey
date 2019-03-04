@extends('layouts.plane')

@section('body')
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url ('/admin') }}">Survey Admin Portal</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li>
                        <a href="{{ route('export') }}"><i class="fa fa-file-excel-o fa-fw"></i>Export Data</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('user.logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out fa-fw"></i>
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>

    <!-- /.navbar-top-links -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Case #">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li {{ (Request::is('/admin') ? 'class="active"' : '') }}>
                    <a href="{{ url ('/admin') }}"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                </li>
                <li {{ (Request::is('*surveys') ? 'class="active"' : '') }}>
                    <a href="{{ route ('surveys.index') }}"><i class="fa fa-bar-chart-o fa-fw"></i>Surveys</a>
                </li>
                <li {{ (Request::is('*notes') ? 'class="active"' : '') }}>
                    <a href="{{ route ('notes.mynotes') }}"><i class="fa fa-edit fa-fw"></i>My Notes</a>
                </li>
                
                @role('Administrator')
                <li>
                    <a href="#"><i class="fa fa-gears fa-fw"></i>Administration<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li {{ (Request::is('*users') ? 'class="active"' : '') }}>
                            <a href="{{ route ('users.index') }}">Users</a>
                        </li>
                        <li {{ (Request::is('*roles') ? 'class="active"' : '') }}>
                            <a href="{{ route ('roles.index') }}">Roles</a>
                        </li>
                        <li {{ (Request::is('*notes') ? 'class="active"' : '') }}>
                            <a href="{{ route ('notes.index') }}">Notes</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                @endrole
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>

<div id="page-wrapper">
 <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">@yield('page_heading')</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">  
    @yield('section')
</div>
<!-- /#page-wrapper -->
</div>
</div>
@stop

