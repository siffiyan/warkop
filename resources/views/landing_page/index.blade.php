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

  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
  
        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
  
        <div class="carousel-inner" role="listbox">
  
          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url({{asset('logo/home.png')}});">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">Belajar Lebih Menyenangkan</h2>
                <p class="animate__animated animate__fadeInUp">Temukan guru privat terbaik sekarang juga,</p>
                <p class="animate__animated animate__fadeInUp">Kamu bisa les berkelompok dengan teman sekelasmu!</p>
                <p class="animate__animated animate__fadeInUp">Nikmati layanan evaluasi belajar dari kami</p>
                <!-- <div>
                  <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div>
      CariGuru
    </div>
  </section>
  <main id="main">
    <section class="counts section-bg" style="background-color: #138D75;">
      <div class="container">
          <div class="section-title">
            <p style="color: white;font-size: 18px;font-weight: 700">Bingung? Yuk tanya kita di Whatsapp &nbsp; <a href="https://api.whatsapp.com/send?phone=6282231826490&text=Halo Cari Guru" target="_blank" class="btn btn-danger rounded-pill" style="background-color: #13c347;border-color: #13c347;"> Konsultasi Sekarang!</a></p>
          </div>
      </div>
    </section>
    <section id="mapel" class="team">
      <div class="container">
        <div class="section-title">
          <h2>Mata Pelajaran Favorit</h2>
          <p>Beberapa Pilihan Mata Pelajaran Favorit</p>
        </div>
        <div class="col-lg-12">
        <div class="row" style="width: 100%; margin-bottom: -50px;">
  
          <div class="col-xl col-lg-2 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic" style="background: #FFF9FB;border: 1px solid #E51453;box-sizing: border-box;border-radius: 12px;"><img src="{{asset('logo/mapel/ekonomi.png')}}" class="img-fluid" style="padding: 60px;" alt="">
              </div>
            </div>
          </div>
  
          <div class="col-xl col-lg-2 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic" style="background: #FFF9FB;border: 1px solid #E51453;box-sizing: border-box;border-radius: 12px;"><img src="{{asset('logo/mapel/inggris.png')}}" class="img-fluid" style="padding: 60px;" alt="">
              </div>
            </div>
          </div>
  
          <div class="col-xl col-lg-2 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic" style="background: #FFF9FB;border: 1px solid #E51453;box-sizing: border-box;border-radius: 12px;"><img src="{{asset('logo/mapel/math.png')}}" class="img-fluid" style="padding: 60px;" alt="">
              </div>
            </div>
          </div>
  
          <div class="col-xl col-lg-2 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic" style="background: #FFF9FB;border: 1px solid #E51453;box-sizing: border-box;border-radius: 12px;"><img src="{{asset('logo/mapel/fisika.png')}}" class="img-fluid" style="padding: 60px;" alt="">
              </div>
            </div>
          </div>
  
          <div class="col-xl col-lg-2 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic" style="background: #FFF9FB;border: 1px solid #E51453;box-sizing: border-box;border-radius: 12px;"><img src="{{asset('logo/mapel/geografi.png')}}" class="img-fluid" style="padding: 60px;" alt="">
              </div>
            </div>
          </div>        
        </div>
  
        <div class="row" style="width: 100%;">
  
          <div class="col-xl col-lg-2 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic" style="background: #FFF9FB;border: 1px solid #E51453;box-sizing: border-box;border-radius: 12px;"><img src="{{asset('logo/mapel/kimia.png')}}" class="img-fluid" style="padding: 60px;" alt="">
              </div>
            </div>
          </div>
  
          <div class="col-xl col-lg-2 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic" style="background: #FFF9FB;border: 1px solid #E51453;box-sizing: border-box;border-radius: 12px;"><img src="{{asset('logo/mapel/tik.png')}}" class="img-fluid" style="padding: 60px;" alt="">
              </div>
            </div>
          </div>
  
          <div class="col-xl col-lg-2 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic" style="background: #FFF9FB;border: 1px solid #E51453;box-sizing: border-box;border-radius: 12px;"><img src="{{asset('logo/mapel/islam.png')}}" class="img-fluid" style="padding: 60px;" alt="">
              </div>
            </div>
          </div>
  
          <div class="col-xl col-lg-2 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic" style="background: #FFF9FB;border: 1px solid #E51453;box-sizing: border-box;border-radius: 12px;"><img src="{{asset('logo/mapel/piano.png')}}" class="img-fluid" style="padding: 60px;" alt="">
              </div>
            </div>
          </div>
  
          <div class="col-xl col-lg-2 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic" style="background: #FFF9FB;border: 1px solid #E51453;box-sizing: border-box;border-radius: 12px;"><img src="{{asset('logo/mapel/guitar.png')}}" class="img-fluid" style="padding: 60px;" alt="">
              </div>
            </div>
          </div>        
        </div>
  
        </div>
      </div>
    </section>
  
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-8 d-flex flex-column justify-content-center about-content">
            <div class="section-title">
                <p style="font-size: 24px;color: #E51453;">Tentang Kami</p>
                <h2>Layanan Les Private Realtime</h2>
                <p class="description">
                  - Guru Berkualitas <br>
                  - Layanan pencarian guru pilihan terbaik<br>
                  - Sistem belajar melalui video call dan chat room<br>
                  - Waktu bisa diatur sendiri<br>
                  - Bisa privat atau berkelompok dengan teman<br>
                  - Evaluasi pembelajaran<br>
                </p>
            </div>
            <table>
              <tr>
                <td>
                  <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon"><i class="bx bx-gift"></i></div>
                    <h4 class="title"><a href="">0</a></h4>
                    <p class="description">Pilihan Guru</p>
                  </div>
                </td>
                <td>
                  <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon"><i class="bx bx-gift"></i></div>
                    <h4 class="title"><a href="">0</a></h4>
                    <p class="description">Room Meet</p>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon"><i class="bx bx-gift"></i></div>
                    <h4 class="title"><a href="">0</a></h4>
                    <p class="description">Mata Pelajaran</p>
                  </div>
                </td>
                <td>
                  <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon"><i class="bx bx-gift"></i></div>
                    <h4 class="title"><a href="">0</a></h4>
                    <p class="description">Provinsi</p>
                  </div>
                </td>
              </tr>
            </table>
          </div>
          <div class="col-md-4 video-box">
            <img src="{{asset('logo/about.png')}}" height="527px" class="img-fluid" alt="">
            <!-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a> -->
          </div>
        </div>
      </div>
    </section>
    <!-- End About Us Section -->
  
    <section id="guruterbaik" class="team">
      <div class="container">
  
        <div class="section-title">
          <h2>Guru Pilihan</h2>
          <p>Beberapa Guru Terbaik Kami</p>
        </div>
  
        <div class="row">
  
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="{{asset('logo/team/team-1.jpg')}}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
              </div>
            </div>
          </div>
  
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="pic"><img src="{{asset('logo/team/team-2.jpg')}}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
              </div>
            </div>
          </div>
  
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <div class="pic"><img src="{{asset('logo/team/team-3.jpg')}}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>CTO</span>
              </div>
            </div>
          </div>
  
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <div class="pic"><img src="{{asset('logo/team/team-4.jpg')}}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Accountant</span>
              </div>
            </div>
          </div>
  
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="{{asset('logo/team/team-1.jpg')}}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
              </div>
            </div>
          </div>
  
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="pic"><img src="{{asset('logo/team/team-2.jpg')}}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
              </div>
            </div>
          </div>
  
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <div class="pic"><img src="{{asset('logo/team/team-3.jpg')}}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>CTO</span>
              </div>
            </div>
          </div>
  
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <div class="pic"><img src="{{asset('logo/team/team-4.jpg')}}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Accountant</span>
              </div>
            </div>
          </div>
  
        </div>
  
      </div>
    </section>
  
    <section id="meet" class="about">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-md-6 video-box">
            <img src="{{asset('logo/meet.png')}}" height="527px" class="img-fluid" alt="">
          </div>
          <div class="col-md-6 d-flex flex-column justify-content-center about-content">
            <div class="section-title">
                <h2>GURU MEET</h2>
                <p class="description">
                  Sebuah Media Video Conference yang akan digunakan dalam les privat online, dengan berbagai macam fitur yang akan mendukung proses belajar mengajar antara guru dan murid. Bisa diakses melalui laptop ataupun perangkat handphone, senyamannya kalian belajar.
                </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  
    <section class="counts section-bg">
      <div class="container">
  
        <div class="row">
  
  
        </div>
  
      </div>
    </section>
  
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
  
        <div class="section-title">
          <h2>Blog</h2>
          <p>Kumpulan Artikel dari Guru - Guru Hebat</p>
        </div>
  
        <div class="row portfolio-container">
          @foreach ($blog as $item)
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="card" style="width: 18rem;">
                <img src="{{asset('berkas/blog/'.$item->image)}}" class="card-img-top" style="height: 300px" alt="...">
                <div class="card-body">
                  <span class="badge badge-danger">{{$item->kategori}}</span>
                  <small>{{date('d F Y', strtotime($item->created_at))}}</small>   
                  <br>
                  <small style="float-right">By {{$item->created_by}}</small>
                  <h6 class="card-title"><b>{{$item->judul}}</b></h6>
                  <a href="#"><small class="text-danger">Baca Selengkapnya...</small></a>
                </div>
              </div>
          </div>
          @endforeach
        </div>
  
      </div>
    </section>
    
  </main>

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