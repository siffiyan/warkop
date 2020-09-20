<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CariGuru</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('logo/logo.png')}}" rel="icon">
  <link href="{{asset('logo/logo.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('template/frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('template/frontend/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('template/frontend/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('template/frontend/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('template/frontend/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('template/frontend/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('template/frontend/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
 

  <!-- Template Main CSS File -->
  <link href="{{asset('template/public_frontend/css/style.css')}}" rel="stylesheet">

</head>

<body>

  <!-- ======= Top Bar ======= -->

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">

      <div class="logo float-left">
        <h1 class="text-light"><a href=""><span><img src="{{asset('logo/logo.png')}}" alt="" style="margin-top: -10px;"></span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li><a href="#about">Tentang Kami</a></li>
          <li><a href="#guruterbaik">Guru Terbaik</a></li>
          <li><a href="#meet">Guru Meet</a></li>
          <li><a href="#" style="color: #E51453;"><b>DAFTAR</b></a></li>
          <li><a href="/tentor/login" style="background: #E51453; color: #fff; border-radius: 4px; margin: 0 15px; padding: 10px 25px;">Masuk</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <div class="content" >
    <div class="container-fluid">
        <div class="row text-center">

            <!-- Post Content Column -->
            <div class="col-lg-10 offset-lg-1">
      
              <!-- Title -->
              <h1 class="mt-4">{{$blog->judul}}</h1>
      
              <!-- Author -->
              <p class="lead">
                by {{$created_by->nama}}
              </p>
      
              <hr>
      
              <!-- Date/Time -->
              <p>Posted on {{date("d F Y, H:i:s",strtotime($blog->created_at))}}</p>
      
              <hr>
      
              <!-- Preview Image -->
              <img class="img-fluid rounded" src="{{asset('berkas/blog/'.$blog->image)}}" width="500px" height="100px" alt="">
      
              <hr>
      
              <!-- Post Content -->
             <p>{!! $blog->content !!}</p>
            </div>
    
      
          </div>
    </div>

</div>		

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
        <div class="container">
          <div class="row">
      
            <div class="col footer-logo" data-aos="fade-up" data-aos-delay="100">
              
              <h4><img src="{{asset('logo/logo.png')}}" width="60" alt="" class="img-fluid"> CARI GURU</h4>
            </div>
      
            <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="200">
              <h4>Menu</h4>
              <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Guru Meet</a></li>
                <li><a href="#">FAQ</a></li>
              </ul>
            </div>
      
            <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="300">
              <h4>Layanan</h4>
              <ul>
                <li><a href="https://bit.ly/mitracariguru">Daftar Partner (Guru)</a></li>
                <li><a href="#">Konfirmasi Pembayaran</a></li>
                
              </ul>
            </div>
      
            <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="400">
              <h4>Kontak</h4>
              <ul>
                <li><a href="#">+62801929283</a></li>
                <li><a href="#">support@cariguru.co.id</a></li>
                <li><a href="#">Jakarta/Indonesia</a></li>
              </ul>
            </div>
      
          </div>
        </div>
      </div>
      <div class="container">
            <div class="copyright">
              &copy; Copyright <strong><span>CariGuru</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
              Designed by <a href="https://cariguru.co.id/">CariGuru</a>
            </div>
          </div>
      
      
  </footer>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  
  <script src="{{asset('template/frontend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('template/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('template/frontend/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('template/frontend/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('template/frontend/vendor/jquery-sticky/jquery.sticky.js')}}"></script>
  <script src="{{asset('template/frontend/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('template/frontend/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('template/frontend/vendor/counterup/counterup.min.js')}}"></script>
  <script src="{{asset('template/frontend/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('template/frontend/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('template/frontend/vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('template/public_frontend/js/main.js')}}"></script>

</body>

</html>