@extends('landing_page.layout.app')

@section('content')
    <!-- Home Banner -->
    <section class="section section-search">
        <div class="container">
            <div class="banner-wrapper m-auto text-center">
                <div class="banner-header">
                    <h1>Belajar Lebih <span>Menyenangkan</span></h1>
                    <p>Temukan guru privat terbaik sekarang juga,</p>
                    <p>Kamu bisa les berkelompok dengan teman sekelasmu!</p>
                    <p>Nikmati layanan evaluasi belajar dari kami</p>
                </div>
                
                <!-- Search -->
                <div class="search-box">
                    <form action="search.html">
                        <div class="form-group search-location">
                            <input type="text" class="form-control" placeholder="Search Location">
                        </div>
                        <div class="form-group search-info">
                            <input type="text" class="form-control" placeholder="Search School, Online educational centers, etc">
                        </div>
                        <button type="submit" class="btn btn-primary search-btn"><i><img src="assets/img/search-submit.png" alt=""></i> <span>Search</span></button>
                    </form>
                </div>
                <!-- /Search -->
                
            </div>
        </div>
    </section>
    <!-- /Home Banner -->

    <section class="section how-it-works">
        <div class="container">
            <div class="section-header text-center">
                <h2>Mata Pelajaran Favorit ?</h2>
                <p class="sub-title">Beberapa Pilihan Mata Pelajaran Favorit</p>
                
            </div>
            <div class="row">
                @for ($i = 0; $i < 8; $i++)
                <div class="col-12 col-md-6 col-lg-3 mb-3">
                    <div class="feature-box text-center">					
                        <div class="feature-header">
                            <div class="feature-icon">
                                <span class="circle"></span>
                                <i><img src="{{asset('template/mentoring/html/assets/img/icon-1.png')}}" alt=""></i>
                            </div>	
                            <div class="feature-cont">
                                <div class="feature-text">
                                    Fisika
                                </div>
                            </div>	
                        </div>
                    </div>
                </div>
                @endfor   
            </div>
            <div class="view-all text-center"><button class="btn btn-outline-primary mt-3">Lihat Lebih BANYAK</button></div>	
        </div>
    </section>

    <section class="section popular-courses">
        <div class="container">
            <div class="section-header text-center">
                <h2>Guru Pilihan</h2>
                <p class="sub-title">Beberapa Guru Pilihan Kami</p>
            </div>
            <div class="owl-carousel owl-theme">
                @for ($i = 0; $i < 16; $i++)
                <div class="course-box">
                    <div class="product">
                        <div class="product-img">
                            <a href="profile.html">
                                <img class="img-fluid" alt="" src="{{asset('template/mentoring/html/assets/img/user/user1.jpg')}}" width="600" height="300">
                            </a>
                        </div>
                        <div class="product-content">
                            <h3 class="title"><a href="profile.html">Donna Yancey</a></h3>
                            <div class="author-info">
                                <div class="author-name">
                                    Digital Marketer
                                </div>
                            </div>
                            <div class="rating">							
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star"></i>
                                <span class="d-inline-block average-rating">4.4</span>
                            </div>
                            <div class="author-country">
                                <p class="mb-0"><i class="fas fa-map-marker-alt"></i> Paris, France</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            
            </div>
        </div>
    </section>

    <!-- Path section start -->
    <section class="section path-section">
        <h5 class="text-center">Image - image</h5>
    </section>
    <!-- Path section end -->

    <!-- Blog Section -->
    <section class="section section-blogs">
        <div class="container">
        
            <!-- Section Header -->
            <div class="section-header text-center">
                <h2>Blog</h2>
                <p class="sub-title">Kumpulan Artikel dari Guru - Guru Hebat</p>
            </div>
            <!-- /Section Header -->
            
            <div class="row blog-grid-row">
                @for ($i = 0; $i < 4; $i ++)
                <div class="col-md-6 col-lg-3 col-sm-12">
                    <!-- Blog Post -->
                    <div class="blog grid-blog">
                        <div class="blog-image">
                            <a href="blog-details.html"><img class="img-fluid" src="{{asset('template/mentoring/html/assets/img/blog/blog-01.jpg')}}" alt="Post Image"></a>
                        </div>
                        <div class="blog-content">
                            <ul class="entry-meta meta-item">
                                <li>
                                    <div class="post-author">
                                        <a href="blog-details.html"><span>Tyrone Roberts</span></a>
                                    </div>
                                </li>
                                <li><i class="far fa-clock"></i> 4 Dec 2019</li>
                            </ul>
                            <h3 class="blog-title"><a href="blog-details.html">What is Lorem Ipsum? Lorem Ipsum is simply</a></h3>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor.</p>
                        </div>
                    </div>
                    <!-- /Blog Post -->
                </div>
                @endfor
            </div>
            <div class="view-all text-center"> 
                <a href="blog-list.html" class="btn btn-primary">View All</a>
            </div>
        </div>
    </section>
    <!-- /Blog Section -->	

    <!-- Statistics Section -->
    <section class="section statistics-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="statistics-list text-center">
                        <span>500+</span>
                        <h3>Happy Clients</h3>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="statistics-list text-center">
                        <span>120+</span>
                        <h3>Online Appointments</h3>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="statistics-list text-center">
                        <span>100%</span>
                        <h3>Job Satisfaction</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Statistics Section -->		
@endsection

@section('js')
    
@endsection