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
                            <h4 class="usr-name">Jonathan Doe</h4>
                            <p class="mentor-type">English Literature (M.A)</p>
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
            
            <div class="col-md-7 col-lg-8 col-xl-9">
                
                @if ($message = Session::get('msg'))
                    <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        
                        <!-- Profile Settings Form -->
                        <form action="{{route('siswa.update_profile')}}" method="POST">
                            @method('put')
                            @csrf
                            <div class="row form-row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" value="{{$siswa->nama}}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" value="{{$siswa->username}}" readonly>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email" value="{{$siswa->email}}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>No Handphone</label>
                                        <input type="text" class="form-control" name="no_hp" value="{{$siswa->no_hp}}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="text" class="form-control" name="tanggal_lahir" value="{{$siswa->tanggal_lahir}}" readonly required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamat" cols="10" rows="5" required>{{$siswa->alamat}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                            </div>
                        </form>
                        <!-- /Profile Settings Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

