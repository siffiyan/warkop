@include('admin.template.header')

@include('admin.template.topbar')
			
@include('admin.template.sidebar')
			
<!-- Page Wrapper -->
<div class="page-wrapper">
<div class="content container-fluid">

<!-- Page Header -->
<div class="page-header">
<div class="row">
<div class="col-sm-12">
<h3 class="page-title">@yield('title')</h3>

</div>
</div>
</div>
<!-- /Page Header -->

<div class="row">
@yield('content')
</div>			
</div>

</div>			
</div>
<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->
		
@include('admin.template.footer')

