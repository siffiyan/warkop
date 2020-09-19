<!-- Header -->
			<header class="header">
				<div class="header-fixed">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="index.html" class="navbar-brand logo"  style="width: 50px;"  style="color:#e51453;font-family: nunito;font-size: 20px;font-weight: 700;">
							<img src="{{asset('logo/logo.png')}}" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="index.html" class="menu-logo">
								<img src="{{asset('logo/logo.png')}}" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li>
								<a href="/siswa/dashboard">Dashboard</a>
							</li>
							<li>
								<a href="/siswa/cariguru">Cari Guru</a>
							</li>
							<li>
								<a href="/siswa/transaksi">Transaksi</a>
							</li>	
							<li>
								<a href="/siswa/schedule">Jadwal Les</a>
							</li>		
							<li>
								<a href="{{route('penilaian.index')}}">Penilaian Tentor</a>
							</li>								
						</ul>		 
					</div>		 
					<ul class="nav header-navbar-rht">
						
						<!-- User Menu -->
						<li class="nav-item dropdown has-arrow logged-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<img class="rounded-circle" src="{{asset('template/mentoring/html/admin/assets/img/profiles/avatar-11.jpg')}}" width="31" alt="Darren Elder">
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="user-header">
									<div class="avatar avatar-sm">
										<img src="{{asset('template/mentoring/html/admin/assets/img/profiles/avatar-11.jpg')}}" alt="User Image" class="avatar-img rounded-circle">
									</div>
									<div class="user-text">
										<h6>{{session('nama')}}</h6>
										<p class="text-muted mb-0">Siswa</p>
									</div>
								</div>
								<a class="dropdown-item" href="{{route('siswa.profile')}}">Profil</a>
							<!-- 	<a class="dropdown-item" href="/siswa/ubah_password">Ubah Password</a> -->
								<a class="dropdown-item" href="/siswa/logout">Logout</a>
							</div>
						</li>
						<!-- /User Menu -->

					</ul>
				</nav>
				</div>
			</header>
			<!-- /Header -->