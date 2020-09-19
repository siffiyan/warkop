@extends('siswa.template.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('star/src/css/star-rating-svg.css')}}" >
@endsection

@section('content')

<div class="col-md-12 col-lg-12 col-xl-12">

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
    <h3 class="pb-3">Evaluasi Tentor</h3>
    <!-- Mentee List Tab -->
    <div class="tab-pane show active" id="mentee-list">
        <div class="card card-table">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th class="text-center">Jam Mulai</th>
                                <th class="text-center">Durasi</th>
                                <th class="text-center">Perserta</th>
                                <th>Mata Pelajaran</th>
                                <th>Murid</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($berhasil as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{date("d F Y",strtotime($item->tanggal_pertemuan))}}</td>
                                <td class="text-center"><span class="pending">{{date("H:i:s",strtotime($item->tanggal_pertemuan))}}</span></td>
                                <td class="text-center">{{$item->durasi}} Menit</td>
                                <td class="text-center">{{$item->jumlah_orang}}</td>
                                <td>{{$item->judul}}</td>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html">{{$item->nama}}<span>{{$item->email}}</span></a>				
                                    </h2>
                                </td>
                                <td class="text-center">
                                    @if($item->evaluasi_mitra == 'NO')
                                    <button type="button" class="btn btn-sm bg-info-light" onclick="evaluasi({{$item->id}})">Beri Evaluasi</button>
                                    @else
                                    <button type="button" class="btn btn-sm bg-info-light" onclick="evaluasi({{$item->id}})">Lihat Review</button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>		
                </div>
            </div>
        </div>
    </div>
    <!-- /Mentee List Tab -->
</div>
@endsection

@section('js') 
    <script src="{{asset('star/src/jquery.star-rating-svg.js')}}"></script>
    <script>
        function evaluasi(id){
            $('#modal_evaluasi').modal('show');
            $.ajax({
                url:'/siswa/penilaian/'+id,
                type:'get',
                dataType:'json',
                success:function(response){
                    console.log(response);
                    var source = "{!! asset('foto_guru') !!}"+"/"+response.detail.foto_profil;
                    $('#image').attr('src', source);
                    $('#nama').html(response.detail.nama);
                    $('#email').html(response.detail.email);
                    $('#mitra_id').val(response.detail.mitra_id);
                    $('#transaksi_id').val(response.detail.id);
                    $('#penilaian').val(response.evaluasi.penilaian);
                    $('#rating').starRating('setRating', response.evaluasi.penilaian);
                    $('#keterangan').val(response.evaluasi.keterangan);
                },
                error:function(){
                    alert('terjadi error');
                }

            });
        }

        $(".my-rating-6").starRating({
            totalStars: 10,
            starSize: 25,
            starShape: 'rounded',
            emptyColor: 'lightgray',
            hoverColor: 'salmon',
            activeColor: 'cornflowerblue',
            strokeWidth: 0,
            useGradient: false,
            disableAfterRate: false,
            minRating: 1,
            callback: function(currentRating, $el){
                $('#penilaian').val(currentRating);
            }
        });
    </script>
@endsection

<div class="modal fade" id="modal_evaluasi" aria-hidden="true" role="dialog">
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Penilaian Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">     
                    <div class="card widget-profile user-widget-profile">
                        <div class="card-body">
                            <div class="pro-widget-content">
                                <div class="profile-info-widget">
                                        <img id="image" width="100px" alt="User Image">
                                    <div class="profile-det-info">
                                        <h3 id="nama"></h3>
                                        <div class="mentee-details">
                                            <h5 class="mb-0" id="email"></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="{{route('penilaian.store')}}" method="POST">
                            <input type="hidden" name="transaksi_id" id="transaksi_id">
                            <input type="hidden" name="mitra_id" id="mitra_id">
                            @csrf
                            <div class="mentee-info">
                                <ul>
                                    <li>
                                        <div class="form-group">
                                            <input type="text" id="penilaian" name="penilaian">
                                            <label>Penilaian (Range 1 - 10)</label>
                                            <div class="my-rating-6" id="rating" data-rating="0"></div>
                                            {{-- <select name="penilaian" id="penilaian" class="form-control">
                                                @for($i=1;$i<=5;$i++)
                                                    <option value="{{$i}}">Bintang {{$i}}</option>
                                                @endfor
                                            </select> --}}
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control" required></textarea>
                                        </div>
                                    </li>
                                    <li>
                                        <button type="submit" class="btn btn-sm bg-primary btn-block text-white">Nilai</button>
                                    </li>
                                </ul>
                            </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
