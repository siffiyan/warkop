@extends('siswa.template.master')

@section('content')

<div class="content">
    <div class="container">

        <!-- Mentor Widget -->
        <div class="card col-10 mr-auto ml-auto p-0">
            <div class="card-body">
                <div class="mentor-widget">
                    <div class="user-info-left align-items-center">
                        <div class="mentor-img d-flex flex-wrap justify-content-center">
                            <div class="pro-avatar">JD</div>
                            <div class="rating">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="mentor-details m-0">
                                <p class="user-location m-0"><i class="fas fa-map-marker-alt"></i> {{$mitra->alamat_domisili}}</p>
                            </div>
                        </div>
                        <div class="user-info-cont">
                            <h4 class="usr-name">{{$mitra->nama}}</h4>
                            <p class="mentor-type">{{$mitra->email}}</p>
                            <div class="mentor-action">
                                <p class="mentor-type social-title">Kontak Pribadi</p>
                                <a href="javascript:void(0)" class="btn-blue">
                                    <i class="fas fa-comments"></i>
                                </a>
                                <a href="chat.html" class="btn-blue">
                                    <i class="fas fa-envelope"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn-blue" data-toggle="modal" data-target="#voice_call">
                                    <i class="fas fa-phone-alt"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="user-info-right d-flex align-items-end flex-wrap">
                        <div class="hireme-btn text-center">
                            <span class="hire-rate">{{$mitra->alamat_domisili}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Mentor Widget -->
        

        <div class="card col-10 mr-auto ml-auto p-0">
            <div class="card-body custom-border-card pb-0">

                <!-- Personal Details -->
                <div class="widget education-widget mb-0">
                    <h4 class="widget-title">Personal Details</h4>
                    <hr/>
                    <div class="experience-box">
                        <ul class="experience-list profile-custom-list">
                            <li>
                                <div class="experience-content">
                                    <div class="timeline-content">
                                        <span>Tempat Lahir</span>
                                        <div class="row-result">{{$mitra->tempat_lahir}}</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="experience-content">
                                    <div class="timeline-content">
                                        <span>Date of Birth</span>
                                        <div class="row-result">{{$mitra->tanggal_lahir}}</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="experience-content">
                                    <div class="timeline-content">
                                        <span>No Handphone</span>
                                        <div class="row-result">{{$mitra->no_hp}}</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /Personal Details -->

            </div>
        </div>

        <div class="card col-10 mr-auto ml-auto p-0">
            <div class="card-body custom-border-card pb-0">

                <!-- Qualification Details -->
                <div class="widget experience-widget mb-0">
                    <h4 class="widget-title">Qualification</h4>
                    <hr/>
                    <div class="experience-box">
                        <ul class="experience-list profile-custom-list">
                            <li>
                                <div class="experience-content">
                                    <div class="timeline-content">
                                        <span>Institusi</span>
                                        <div class="row-result">{{$mitra->nama_institusi}}</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="experience-content">
                                    <div class="timeline-content">
                                        <span>Jurusan</span>
                                        <div class="row-result">{{$mitra->prodi}}</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="experience-content">
                                    <div class="timeline-content">
                                        <span>Pendidikan Terakhir</span>
                                        <div class="row-result">{{$mitra->pendidikan_terakhir}}</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /Qualification Details -->

            </div>
        </div>

        <div class="card col-10 mr-auto ml-auto p-0">
            <div class="card-body custom-border-card pb-0">

                <!-- Location Details -->
                <div class="widget awards-widget m-0">
                    <h4 class="widget-title">Prestasi</h4>
                    <hr/>
                    <div class="experience-box">
                        <table class="table">
                            <tbody>
                                @foreach ($prestasi as $item)
                                <tr>
                                    <td> <b>{{$item->keterangan_prestasi}}</b> </td>
                                    <td> <b>{{$item->tahun}}</b></td>
                                </tr>
                                @endforeach
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /Location Details -->

            </div>
        </div>
        <!-- /Mentor Details Tab -->

    </div>
</div>		

@endsection