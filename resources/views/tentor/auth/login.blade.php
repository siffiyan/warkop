<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="endless admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, endless admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link href="{{asset('logo/logo.png')}}" rel="icon">
    <link rel="shortcut icon" href="public/img/logo.png" type="image/x-icon">
    <title>Halaman Login</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/css/fontawesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login/css/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/css/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/css/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/css/feather-icon.css')}}">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/css/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('login/css/light-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/css/responsive.css')}}">
  </head>
  <body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="loader bg-white">
        <div class="whirly-loader"> </div>
      </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
      <div class="container-fluid p-0">
        <!-- login page start-->
        <div class="authentication-main">
          <div class="row">
            <div class="col-md-12">
              <div class="text-center">
                <div class="text-center">
                  
                  <img src="{{asset('logo/logo.png')}}" width="5%">
                  <h2>Login Mitra Cariguru</h2>
                </div>
            </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-xl-6">
              <div class="text-center">
                <img src="{{asset('logo/login.png')}}" width="100%" alt="">
              </div>
            </div>
            <div class="col-sm-12 col-xl-6">
              <div class="auth-innerright">
                <div class="authentication-box">
                
                 @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{$message}} 
                </div>    
                @endif     

                @if ($message = Session::get('error'))
                <div class="alert alert-danger">
                    {{$message}} 
                </div>    
                @endif              
                 
                    <div class="card mt-4" style="border-radius: 4px;">
                        <div class="card-body">
                          <form class="theme-form" action="/tentor/login" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus required="" style="background-color: #F9EFF2; border-color: #F9EFF2;">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="" required="" style="background-color: #F9EFF2; border-color: #F9EFF2;">
                            </div>
                            <div class="form-group form-row mt-3 mb-0">
                              <button class="btn btn-danger btn-block" type="submit">LOGIN</button>
                            </div>
                          </form>
                        </div>
                      </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- login page end-->
      </div>
    </div>
    <!-- latest jquery-->
    <script src="{{asset('login/js/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{asset('login/js/bootstrap/popper.min.js')}}"></script>
    <script src="{{asset('>login/js/bootstrap/bootstrap.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{asset('login/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{asset('login/js/icons/feather-icon/feather-icon.js')}}"></script>
    <!-- Sidebar jquery-->
    <script src="{{asset('login/js/sidebar-menu.js')}}"></script>
    <script src="{{asset('login/js/config.js')}}"></script>
    <!-- Plugins JS start-->
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{asset('login/js/script.js')}}"></script>
    <!-- Plugin used-->
  </body>

<!-- Mirrored from admin.pixelstrap.com/endless/ltr/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 May 2020 19:02:49 GMT -->
</html>