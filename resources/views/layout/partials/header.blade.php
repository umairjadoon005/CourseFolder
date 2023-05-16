<!-- Main Wrapper -->

<div class="main-wrapper">
		
		<!-- Header -->
		<div class="header" id="heading">
		
			<!-- Logo -->
			<div class="header-left">
				<a href="{{url('index')}}" class="logo">
					<img src="{{ URL::asset('/assets/img/logo.png')}}"  alt="Logo" class="sidebar-logo">
					<img src="{{ URL::asset('/assets/img/s-logo.png')}}"  alt="Logo" class="mini-sidebar-logo">
				</a>
			</div>
			<!-- /Logo -->
			
			<a id="toggle_btn" href="javascript:void(0);">
				<span class="bar-icon">
					<span></span>
					<span></span>
					<span></span>
				</span>
			</a>
			
			<!-- Header Title -->
			<div class="page-title-box">
				<div class="top-nav-search">
						<a href="javascript:void(0);" class="responsive-search">
							<i class="fa fa-search"></i>
					   </a>
						<form action="search">
							<input class="form-control" type="text" placeholder="Search here">
							<button class="btn" type="submit"><i class="fa fa-search"></i></button>
						</form>
					</div>
			</div>
			<!-- /Header Title -->
			
			<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
			
			<!-- Header Menu -->
			<ul class="nav user-menu">
			
				<!-- Search -->
				<li class="nav-item">
					
				</li>
				<!-- /Search -->

				<li class="nav-item dropdown has-arrow main-drop">
					<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
						<span class="user-img"><img src="{{ URL::asset('/assets/img/profiles/avatar-21.jpg')}}" alt="">
						<span class="status online"></span></span>
						<span style="text-transform: capitalize;">{{\Auth::user()->name}}</span>
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="{{url('profile')}}">My Profile</a>
						<a class="dropdown-item" href="{{url('edit')}}">Settings</a>
						<a class="dropdown-item" href="{{url('login')}}">Logout</a>
					</div>
				</li>
			</ul>
			<!-- /Header Menu -->
			
			<!-- Mobile Menu -->
			<div class="dropdown mobile-user-menu">
				<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
				<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="{{url('profile')}}">My Profile</a>
					<a class="dropdown-item" href="{{url('edit')}}">Settings</a>
					<a class="dropdown-item" href="{{url('login')}}">Logout</a>
				</div>
			</div>
			<!-- /Mobile Menu -->
			
		</div>
		<!-- /Header -->
