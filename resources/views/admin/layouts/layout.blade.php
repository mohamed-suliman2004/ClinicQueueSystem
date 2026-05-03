<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>@yield('title')</title>

	<link  href="{{ asset('AdminJs/css/app.css') }}" rel="stylesheet"></link>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          <span class="align-middle">Admin Dashboard</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Index
					</li>
        <li class="sidebar-item  {{ request()->routeIs('admin.index')? 'active' : '' }}">
						<a class="sidebar-link" href="{{ route('admin.index') }}">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Index</span>
            </a>
					</li>

					<li class="sidebar-header">
						Department
					</li>

					   <li class="sidebar-item  {{ request()->routeIs('admin.departments.create')? 'active' : '' }}">
						<a class="sidebar-link" href="{{ route('admin.departments.create') }}">
              <i class="align-middle" data-feather="square"></i> <span class="align-middle">Create</span>
            </a>
					</li>

					<li class="sidebar-item  {{ request()->routeIs('admin.departments.manage')? 'active' : '' }}">
						<a class="sidebar-link" href="{{ route('admin.departments.manage') }}">
              <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Manage</span>
            </a>
					</li>

					<li class="sidebar-header">
						Doctor
					</li>


					<li class="sidebar-item  {{ request()->routeIs('admin.doctors.create')? 'active' : '' }}">
						<a class="sidebar-link" href="{{ route('admin.doctors.create') }}">
               <i class="align-middle" data-feather="square"></i> <span class="align-middle">Create</span>
            </a>
					</li>

					<li class="sidebar-item  {{ request()->routeIs('admin.doctors.manage')? 'active' : '' }}">
						<a class="sidebar-link" href="{{ route('admin.doctors.manage') }}">
             <i class="align-middle" data-feather="check-square"></i>  <span class="align-middle">Manage</span>
            </a>
					</li>

                    	<li class="sidebar-header">
						User
					</li>


					<li class="sidebar-item  {{ request()->routeIs('admin.users.manage')? 'active' : '' }}">
						<a class="sidebar-link" href="{{ route('admin.users.manage') }}">
            <i class="align-middle" data-feather="check-square"></i>  <span class="align-middle">Manage</span>
            </a>
					</li>
				</ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">

						<li class="nav-item dropdown">


						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

						<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
							 <span class="text-dark">{{ Auth::user()->name }}</span>
						</a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="index.html"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
							<div class="dropdown-divider"></div>
							<form method="POST" action="{{ route('logout') }}">
								@csrf
								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Log out</a>
							</form>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
            @include('components.errors')
            @include('components.massegees')
            @yield('admin-content')
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>Admin Dashboad</strong></a> - <a class="text-muted" href="{{route('admin.index')}}" target="_blank"><strong>Clinic Management System</strong></a>								&copy;
							</p>
						</div>
				
					</div>
				</div>
			</footer>
		</div>
	</div>

<script src="{{ asset('AdminJs/js/app.js') }}"></script>
	<script src="{{ asset('AdminJs/js/live-search.js') }}"></script>
</body>

</html>
