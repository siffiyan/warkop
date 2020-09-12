<!-- Sidebar -->
<div class="profile-sidebar">
	<div class="user-widget">
		<div class="pro-avatar">JD</div>
		<div class="rating">
			<i class="fas fa-star filled"></i>
			<i class="fas fa-star filled"></i>
			<i class="fas fa-star filled"></i>
			<i class="fas fa-star filled"></i>
			<i class="fas fa-star"></i>
		</div>
		<div class="user-info-cont">
			<h4 class="usr-name">{{ session()->get('nama')}}</h4>
			<p class="mentor-type">Mentor</p>
		</div>
	</div>
	<div class="progress-bar-custom">
		<h6>Complete your profiles ></h6>
		<div class="pro-progress">
			<div class="tooltip-toggle" tabindex="0"></div>
			<div class="tooltip">80%</div>
		</div>
	</div>
	<div class="custom-sidebar-nav">
		<ul>
			<li><a href="/tentor/dashboard" @if(Request::segment(2) == 'dashboard')class="active" @endif><i class="fas fa-home"></i>Dashboard<span><i class="fas fa-chevron-right"></i></span></a></li>
			<li><a href="/tentor/permintaan_les"  @if(Request::segment(2) == 'permintaan_les')class="active" @endif><i class="fas fa-star"></i>Permintaan Les <span><i class="fas fa-chevron-right"></i></span></a></li>
			<li><a href="/tentor/schedule"  @if(Request::segment(2) == 'schedule')class="active" @endif><i class="fas fa-user"></i>Schedule <span><i class="fas fa-chevron-right"></i></span></a></li>
			<li><a href="/tentor/evaluasi"  @if(Request::segment(2) == 'evaluasi')class="active" @endif><i class="fas fa-user"></i>Evaluasi Belajar <span><i class="fas fa-chevron-right"></i></span></a></li>
			<li><a href="{{route('tentor.pencairan.index')}}"  @if(Request::segment(2) == 'pencairan')class="active" @endif><i class="fas fa-wallet"></i>Pencairan Dana <span><i class="fas fa-chevron-right"></i></span></a></li>
			<li><a href="{{route('tentor.bank.index')}}"  @if(Request::segment(2) == 'bank')class="active" @endif><i class="fas fa-wallet"></i>Bank <span><i class="fas fa-chevron-right"></i></span></a></li>
			<li><a href="{{route('blog.index')}}"  @if(Request::segment(2) == 'blog')class="active" @endif><i class="fab fa-blogger-b"></i>Blog <span><i class="fas fa-chevron-right"></i></span></a></li>
			<li><a href="/tentor/profil" @if(Request::segment(2) == 'profil')class="active" @endif><i class="fas fa-user-cog"></i>Profile <span><i class="fas fa-chevron-right"></i></span></a></li>
		</ul>
	</div>
</div>
<!-- /Sidebar -->
