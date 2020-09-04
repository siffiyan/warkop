@extends('admin.template.master')

@section('title', 'Blog')
    
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">

                <!-- Blog details -->
                <div class="row">
                    <div class="col-12 blog-details">
                        <span class="course-title">{{$blog->judul}}</span>
                        <div class="d-flex flex-wrap date-col">
                            <span class="date"><i class="fas fa-calendar-check"></i> {{date('d F Y', strtotime($blog->created_at))}}</span>
                            <span class="author"><i class="fe fe-user"></i> By {{$blog->nama}}</span>
                        </div>
                        <div class="blog-details-img">
                            <img class="img-fluid" src="{{asset('berkas/blog/'.$blog->image)}}" alt="Post Image">
                        </div>
                        <div class="blog-content">
                            {!!$blog->content!!}
                        </div>
                    </div>
                </div>
                <!-- /Blog details -->

            </div>
        </div>

        <!-- Share post -->
        <div class="card">
            <div class="card-body">
                <h4>Share the post</h4>
                <ul class="share-post">
                    <li>
                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i> </a>
                    </li>
                    <li>
                        <a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
                    </li>
                    <li>
                        <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </li>
                    <li>
                        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#" target="_blank"><i class="fab fa-dribbble"></i> </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /Share post -->

        <!-- About Author -->
        <div class="card">
            <div class="card-body">
                <h4>Tentang Penulis</h4>
                <div class="about-author pt-4 d-flex align-items-center">
                    {{-- <div class="left">
                        <img class="rounded-circle" src="assets/img/profiles/avatar-12.jpg" width="120" alt="Ryan Taylor">
                    </div> --}}
                    <div class="right">
                        <h5>{{$blog->nama}}</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /About Author -->

    </div>			
</div>

@endsection