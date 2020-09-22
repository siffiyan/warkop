@extends('siswa.template.master')

@section('content')

<div class="content success-page-cont">
    <div class="container-fluid">
    
        <div class="row justify-content-center">
            <div class="col-lg-6">
            
                <!-- Success Card -->
                <div class="card success-card">
                    <div class="card-body">
                        <div class="success-cont">
                            <i class="fas fa-question"></i>
                            <h3>Apakah anda sudah melakukan pembayaran?</h3>
                            <p>Jika sudah, Segera lakukan konfirmasi ke salah satu admin <strong>Cari Guru</strong></p>
                            <p>Jangan lupa untuk mempersiapkan <b>bukti transfernya</b> juga yaa :))</p>
                            <a href="https://wa.me/089679249495?text=Halo admin Cariguru, kita udah transfer nih untuk kode {{$kode_transaksi}}, berikut untuk bukti pembayarannya yaa" target="_blank" class="btn view-inv-btn text-white" style="background-color: #128c7e"> <img src="{{asset('wa.png')}}" width="10%" alt=""> &nbsp; Konfirmasi Pembayaran</a>
                        </div>
                    </div>
                    
                </div>
                <!-- /Success Card -->
                
            </div>
        </div>
        
    </div>
</div>

@endsection