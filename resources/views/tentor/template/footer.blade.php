	  
		<!-- jQuery -->
		<script src="{{asset('template/mentoring/html/assets/js/jquery.min.js')}}"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{asset('template/mentoring/html/assets/js/popper.min.js')}}"></script>
		<script src="{{asset('template/mentoring/html/assets/js/bootstrap.min.js')}}"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="{{asset('template/mentoring/html/assets/plugins/theia-sticky-sidebar/ResizeSensor.js')}}"></script>
        <script src="{{asset('template/mentoring/html/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')}}"></script>

        <!-- Datetimepicker JS -->
		<script src="{{asset('template/mentoring/html/assets/js/moment.min.js')}}"></script>
		<script src="{{asset('template/mentoring/html/assets/js/bootstrap-datetimepicker.min.js')}}"></script>

         <!-- Datatables JS -->
		<script src="{{asset('template/mentoring/html/admin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('template/mentoring/html/admin/assets/plugins/datatables/datatables.min.js')}}"></script>
		
		<!-- Circle Progress JS -->
		<!-- <script src="assets/js/circle-progress.min.js"></script> -->

		<script type="text/javascript">
			$('#tabel1').dataTable();
			
		</script> 
			
		@yield('js')
		
		<!-- Custom JS -->
		<script src="{{asset('template/mentoring/html/assets/js/script.js')}}"></script>
		
	</body>
</html>