<?php error_reporting(0);?>
@if(!Route::is(['email','mail-view','components']))
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
    	<form action="search" class="mobile-view">
			<input class="form-control" type="text" placeholder="Search here">
			<button class="btn" type="button"><i class="fa fa-search"></i></button>
		</form>
		<div id="sidebar-menu" class="sidebar-menu">

			<ul>
				<li class="nav-item nav-profile">
	              <a href="#" class="nav-link">
	                <div class="nav-profile-image">
	                  <img src="{{ URL::asset('/assets/img/profiles/avatar-17.jpg')}}" alt="profile">
	                  
	                </div>
	                <div class="nav-profile-text d-flex flex-column">
	                  <span class="font-weight-bold mb-2">{{ Auth::user()->name}}</span>
	                  <span class="text-white text-small">Course Manager</span>
	                </div>
	                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
	              </a>
	            </li>
				<li class="{{ Request::is('course-descriptions') ? 'active' : '' }}"> 
					<a href="{{url('course-descriptions')}}"><i class="feather-smartphone"></i> <span>Course Description</span></a>
				</li>				
				<li class="{{ Request::is('course-outlines') ? 'active' : '' }}"> 
					<a href="{{url('course-outlines')}}"><i class="feather-check-square"></i> <span>Course Outline</span></a>
				</li>

				<li class="{{ Request::is('lecture-notes') ? 'active' : '' }}"> 
					<a href="{{url('lecture-notes')}}"><i class="feather-database"></i> <span>Lecture Notes</span></a>
				</li>
				<li class="{{ Request::is('question-papers') ? 'active' : '' }}"> 
					<a href="{{url('question-papers')}}"><i class="feather-user"></i> <span>Question Papers</span></a>
				</li>
				
				<li class="{{ Request::is('model-solutions') ? 'active' : '' }}"> 
					<a href="{{url('model-solutions')}}"><i class="feather-radio"></i> <span>Model Solutions</span></a>
				</li>
				<li class="{{ Request::is('samples') ? 'active' : '' }}"> 
					<a href="{{url('samples')}}"><i class="feather-grid"></i> <span>Samples</span></a>
				</li>
				
				<li class="{{ Request::is('attendance') ? 'active' : '' }}"> 
					<a href="{{url('attendance')}}"><i class="feather-grid"></i> <span>Attendance</span></a>
				</li>
				<li class="{{ Request::is('logs') ? 'active' : '' }}"> 
					<a href="{{url('logs')}}"><i class="feather-grid"></i> <span>Course Logs</span></a>
				</li>	
				<li class="{{ Request::is('results') ? 'active' : '' }}"> 
					<a href="{{url('results')}}"><i class="feather-grid"></i> <span>Results</span></a>
				</li>
			</ul>
		</div>
    </div>
</div>
<!-- /Sidebar -->
@endif
<!-- Sidebar -->
@if(Route::is(['email','mail-view']))
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
    	<form action="search" class="mobile-view">
			<input class="form-control" type="text" placeholder="Search here">
			<button class="btn" type="button"><i class="fa fa-search"></i></button>
		</form>
		<div class="sidebar-menu">
			<ul>
				<li> 
					<a href="{{url('index')}}"><i class="fa fa-home" aria-hidden="true"></i> <span>Back to Home</span></a>
				</li>
	             <li class="{{ Request::is('email','mail-view') ? 'active' : '' }}"> 
	                <a href="{{url('email')}}"><i class="fa fa-envelope menu-icon" aria-hidden="true"></i> <span>Inbox <span class="mail-count">(21)</span></span></a>
	            </li>
	            <li> 
	                <a href="#"><i class="fa fa-star menu-icon" aria-hidden="true"></i> <span>Starred</span></a>
	            </li>
	            <li> 
	                <a href="#"><i class="fa fa-paper-plane menu-icon" aria-hidden="true"></i> <span>Sent Mail</span></a>
	            </li>
	            <li> 
	                <a href="#"><i class="fa fa-trash menu-icon" aria-hidden="true"></i> <span>Trash</span></a>
	            </li>
	            <li> 
	                <a href="#"><i class="fa fa-folder-open-o menu-icon" aria-hidden="true"></i> <span>Draft <span class="mail-count">(8)</span></span></a>
	            </li>
  
				
				<li class="menu-title xs-hidden">Label <a href="#" class="label-icon"><i class="fa fa-plus"></i></a></li>
				<li class="xs-hidden"> 
					<a href="#"><i class="fa fa-circle text-success mail-label"></i> Work</a>
				</li>
				<li class="xs-hidden"> 
					<a href="#"><i class="fa fa-circle text-danger mail-label"></i> Office</a>
				</li>
				<li class="xs-hidden"> 
					<a href="#"><i class="fa fa-circle text-warning mail-label"></i> Personal</a>
				</li>
			</ul>
		</div>
    </div>
</div>
<!-- /Sidebar -->
@endif	
@if(Route::is(['components']))
<!-- Sidebar -->
<div class="sidebar stickyside" id="sidebar">
    <div class="sidebar-inner slimscroll">
    	<form action="search" class="mobile-view">
			<input class="form-control" type="text" placeholder="Search here">
			<button class="btn" type="button"><i class="fa fa-search"></i></button>
		</form>
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>
				<li> 
					<a href="{{url('index')}}">Back To Home</a>
				</li>
				<li class="menu-title"> 
					Components
				</li>
				<li> 
					<a href="#comp_alerts" class="active">Alerts</a>
				</li>
				<li> 
					<a href="#comp_breadcrumbs">Breadcrumbs</a>
				</li>
				<li> 
					<a href="#comp_buttons">Buttons</a>
				</li>
				<li> 
					<a href="#comp_cards">Cards</a>
				</li>
				<li> 
					<a href="#comp_dropdowns">Dropdowns</a>
				</li>
				<li> 
					<a href="#comp_pagination">Pagination</a>
				</li>
				<li> 
					<a href="#comp_progress">Progress</a>
				</li>
				<li> 
					<a href="#comp_tabs">Tabs</a>
				</li>
				<li> 
					<a href="#comp_typography">Typography</a>
				</li>
			</ul>
		</div>
    </div>
</div>
<!-- /Sidebar -->
@endif
