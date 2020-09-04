@include('tentor.template.header')

<!-- Main Wrapper -->
<div class="main-wrapper">

@include('tentor.template.topbar')


<!-- Page Content -->
<div class="content">
<div class="container-fluid">

<div class="row">
<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

@include('tentor.template.sidebar')

</div>

<div class="col-md-7 col-lg-8 col-xl-9">

<div class="row">

@yield('content')

</div>



</div>
</div>

</div>

</div>		
<!-- /Page Content -->

</div>
<!-- /Main Wrapper -->

@include('tentor.template.footer')