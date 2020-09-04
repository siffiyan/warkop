@include('siswa.template.header')

<!-- Main Wrapper -->
<div class="main-wrapper">
@include('siswa.template.topbar')

<div class="content">
<div class="container-fluid">

@yield('content')

</div>		
</div>

</div>
<!-- /Main Wrapper -->
	  
@include('siswa.template.footer')