<?php
	use App\Helpers\App;
?>

<!-- Sidebar -->
<div class="profile-sidebar">
	<div class="user-widget">
		<div class="pro-avatar">JD</div>
		<div class="my-rating" data-rating="<?php echo App::get_rating(session('id')) ?>"></div>
		<div class="user-info-cont mt-2">
			<h4 class="usr-name">{{ session()->get('nama')}}</h4>
			<p class="mentor-type">Mentor</p>
			<p style="margin-top:-5px">( <?php echo App::get_poin(session('id'))?> Point ) </p>
		</div>
	</div>

	<?php; ?>
	<div class="progress-bar-custom">
		<h6>Complete your profiles</h6>

			<div class="progress">
			<div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?php echo App::get_completness(session('id')) ?>%" aria-valuenow="<?php echo App::get_completness(session('id')) ?>" aria-valuemin="0" aria-valuemax="100"><?php echo App::get_completness(session('id')) ?> %
			</div>
			</div>
	</div>
	<div class="custom-sidebar-nav">
		<ul>
			<li><a href="/tentor/dashboard" @if(Request::segment(2) == 'dashboard')class="active" @endif><i class="fas fa-home"></i>Dashboard<span><i class="fas fa-chevron-right"></i></span></a></li>
			<li><a href="/tentor/permintaan_les"  @if(Request::segment(2) == 'permintaan_les')class="active" @endif><i class="fas fa-star"></i>Permintaan Les <span><i class="fas fa-chevron-right"></i></span></a></li>
			<li><a href="/tentor/schedule"  @if(Request::segment(2) == 'schedule')class="active" @endif><i class="fas fa-clock"></i>Jadwal Les <span><i class="fas fa-chevron-right"></i></span></a></li>
			<li><a href="/tentor/evaluasi"  @if(Request::segment(2) == 'evaluasi')class="active" @endif><i class="fas fa-chalkboard-teacher"></i>Evaluasi Belajar <span><i class="fas fa-chevron-right"></i></span></a></li>
			<li><a href="{{route('tentor.pencairan.index')}}"  @if(Request::segment(2) == 'pencairan')class="active" @endif><i class="far fa-money-bill-alt"></i>Pencairan Dana <span><i class="fas fa-chevron-right"></i></span></a></li>
			<li><a href="{{route('tentor.bank.index')}}"  @if(Request::segment(2) == 'bank')class="active" @endif><i class="fas fa-credit-card"></i>Bank <span><i class="fas fa-chevron-right"></i></span></a></li>
			<li><a href="{{route('blog.index')}}"  @if(Request::segment(2) == 'blog')class="active" @endif><i class="fab fa-blogger-b"></i>Blog <span><i class="fas fa-chevron-right"></i></span></a></li>
			<li><a href="/tentor/profil" @if(Request::segment(2) == 'profil')class="active" @endif><i class="fas fa-user-cog"></i>Profil <span><i class="fas fa-chevron-right"></i></span></a></li>
		</ul>
	</div>
</div>
<!-- /Sidebar -->
