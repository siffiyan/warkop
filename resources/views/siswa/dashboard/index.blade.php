@extends('siswa.template.master')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
        
            <!-- Profile Sidebar -->
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

                <!-- Sidebar -->
                <div class="profile-sidebar">
                    <div class="user-widget">
                        <div class="pro-avatar">JD</div>
                        <div class="rating">
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="user-info-cont">
                            <h4 class="usr-name">{{session()->get('nama')}}</h4>
                            <p class="mentor-type">Siswa</p>
                        </div>
                    </div>
                    <div class="progress-bar-custom">
                        <h6>Complete your profiles ></h6>
                        <div class="pro-progress">
                            <div class="tooltip-toggle" tabindex="0"></div>
                            <div class="tooltip">80%</div>
                        </div>
                    </div>

                    <div class="custom-sidebar-nav">
                        <ul>
                            <li><a href="dashboard.html"><i class="fas fa-home"></i>Dashboard <span><i class="fas fa-chevron-right"></i></span></a></li>
                            <li><a href="bookings.html"><i class="fas fa-clock"></i>Bookings <span><i class="fas fa-chevron-right"></i></span></a></li>
                            <li><a href="schedule-timings.html"><i class="fas fa-hourglass-start"></i>Schedule Timings <span><i class="fas fa-chevron-right"></i></span></a></li>
                            <li><a href="chat.html"><i class="fas fa-comments"></i>Messages <span><i class="fas fa-chevron-right"></i></span></a></li>
                            <li><a href="blog.html"><i class="fab fa-blogger-b"></i>Blog <span><i class="fas fa-chevron-right"></i></span></a></li>
                            <li><a href="{{route('siswa.profile')}}" @if(Request::segment(2) == 'profile') class="active" @endif><i class="fas fa-user-cog"></i>Profile <span><i class="fas fa-chevron-right"></i></span></a></li>
                            <li><a href="login.html"><i class="fas fa-sign-out-alt"></i>Logout <span><i class="fas fa-chevron-right"></i></span></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /Sidebar -->

            </div>
            <!-- /Profile Sidebar -->
        </div>
    </div>

</div>

@endsection