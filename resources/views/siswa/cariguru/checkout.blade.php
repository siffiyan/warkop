@extends('siswa.template.master')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">
     hr{
          border-top: 2px solid #E51453;
    }
</style>

@endsection

@section('content')
<div class="row">
    <div class="col-md-7 col-lg-8">
        <div class="card">
            <div class="card-body">
            
                <!-- Checkout Form -->
                <form action="booking-success.html">

                    <!-- Personal Information -->
                    <div class="info-widget">
                        <h4 class="card-title">Jadwal</h4>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Jumlah Pertemuan</label>
                                    <input class="form-control" type="number" value="1" id="jumlah_pertemuan">
                                    <input type="hidden" id="pilihan_guru" value="{{$pilihan_guru}}">
                                </div>
                            </div>
                        </div>
                        <div class="row" id="append-pertemuan"></div>
                        <button class="btn btn-danger" type="button" id="button_cek_harga" style="background: #E51453;border:1px solid #E51453;display: none;">Cek Harga</button>
                    </div>
                    <!-- /Personal Information -->
                
                <!-- Booking Mentee Info -->

                @foreach($guru as $r)

                <div class="card">
                <div class="card-body">

                <div class="booking-user-info">
                    <a href="payment-mentee.html" class="booking-user-img">
                        <img src="{{asset('/foto_guru/'.$r->foto_profil)}}" class="img-fluid" alt="User Image">
                    </a>
                    <div class="booking-info">
                        <h4><a href="payment-mentee.html">{{$r->nama}}</a></h4>
                        <p class="mentor-type">{{$r->nama_institusi}}</p>
                    </div>
                </div>

                </div>
                </div>

                @endforeach

                <!-- Booking Mentee Info -->

                </form>
                <!-- /Checkout Form -->
                
            </div>
        </div>
        
    </div>
    
    <div class="col-md-5 col-lg-4 theiaStickySidebar">
    
        <!-- Booking Summary -->
        <div class="card booking-card">
            <div class="card-header">
                <h4 class="card-title">Booking Summary</h4>
            </div>
            <div class="card-body">
                
                <input type="hidden" id="jenjang_id" value="{{$jenjang->id}}">
                <input type="hidden" id="kurikulum_id" value="{{$kurikulum->id}}">
                <input type="hidden" id="mapel_id" value="{{$mapel->id}}">
                
                <div class="booking-summary">
                    <div class="booking-item-wrap">
                        <ul class="booking-date">
                            <li>Jenjang <span>{{$jenjang->jenjang}}</span></li>
                            <li>Kurikulum <span>{{$kurikulum->kurikulum}}</span></li>
                            <li>Mata Pelajaran <span>{{$mapel->mata_pelajaran}}</span></li>
                        </ul>
                        <hr>

                        <div id="place_detail_harga" style="display: none;">

                        <ul class="booking-fee">
                            <li>Jumlah Pertemuan<span id="total_pertemuan">2</span></li>
                            <div id="harga_per_pertemuan"></div>
                            <hr>
                            <li>Total Harga<span id="total_harga_awal"></span></li>
                            <li>Kode Promo <input type="text" class="form-control" id="promo"><span><button class="btn btn-success btn-sm mt-2" type="button" id="btn-promo">Gunakan</button></span><small id="keterangan_diskon" style="color:red;"></small></li>
                        </ul>
                        <br>
                        <div class="booking-total">
                            <ul class="booking-total-list">
                                <li>
                                    <span>Total</span>
                                    <span class="total-cost" id="total_harga_akhir"></span>
                                    <input type="hidden" id="total_harga_hidden">
                                </li>
                            </ul>
                        </div>
                        <br>
                        <button class="btn btn-block btn-success" type="button" id="button_lanjutkan_pembayaran" style="background: #E51453;border:1px solid #E51453;">LANJUTKAN PEMBAYARAN</button>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /Booking Summary -->
        
    </div>
</div>
@endsection

@section('js')
    <script>


        var counter = 0;

        $('#button_cek_harga').click(function(){

            var jumlah_orang = [];
            var durasi_pertemuan = [];
            var jenjang_id = $('#jenjang_id').val();
            var kurikulum_id = $('#kurikulum_id').val();
            var _token = $('meta[name="csrf-token"]').attr('content');

            var pertemuan = $('#jumlah_pertemuan').val();
            $('#place_detail_harga').show();
            $('#total_pertemuan').html(pertemuan);

            for (var i = 0; i < counter; i++) {
                jumlah_orang.push($('#jumlah_orang'+i).val());
                durasi_pertemuan.push($('#durasi_pertemuan'+i).val());
            }

            var total = 0;

            $.ajax({
                 url:'/siswa/cariguru/cek_harga',
                 type:'POST',
                 data:{jumlah_orang:jumlah_orang,durasi_pertemuan:durasi_pertemuan,jenjang_id:jenjang_id,kurikulum_id:kurikulum_id,_token:_token},
                 dataType:'json',
                 success:function(response){
                    $('#harga_per_pertemuan').empty();
                    $.each(response,function(i,value){
                        $('#harga_per_pertemuan').append(`
                            <li>Harga Pertemuan ${i+1}<span>`+rubah(value.harga)+`</span></li>
                            <input type="hidden" id="harga${i}" value=`+value.harga+`>
                        `);
                        total = total + value.harga;
                    });
                    $('#total_harga_awal').html(rubah(total));
                    $('#total_harga_akhir').html(`Rp `+rubah(total));
                    $('#total_harga_hidden').val(total);
                 },
                 error:function(){
                    alert('terjadi error');
                 }
            })

        });

        tampilkan_jadwal(1);

        function tampilkan_jadwal(pertemuan){
            $('#append-pertemuan').empty();
            $('#button_cek_harga').show();;

            counter = 0;
            for(i = 1; i <= pertemuan; i ++){
                $('#append-pertemuan').append(`
                    <div class="col-md-5 col-sm-12">
                        <div class="form-group">
                            <label>Tanggal dan Waktu Pertemuan `+i+`</label>
                            <input class="form-control" type="date" id="tanggal_pertemuan${i-1}">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                            <label>Jumlah Orang `+i+`</label>
                            <input class="form-control" type="number" id="jumlah_orang${i-1}" onkeypress="validate(event)">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                           <label>Durasi Pertemuan `+i+`</label>
                           <select class="select form-control" id="durasi_pertemuan${i-1}">
                                <option value="90">90 menit</option>  
                                <option value="120">120 menit</option>
                            </select>
                        </div>
                    </div>

                `);
                counter++;

            }
        }

        function validate(evt) {
        var theEvent = evt || window.event;

        // Handle paste
        if (theEvent.type === 'paste') {
            key = event.clipboardData.getData('text/plain');
        } else {
        // Handle key press
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
        }
        var regex = /[1-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
        }

        $('#jumlah_pertemuan').keyup(function(){
            var pertemuan = $('#jumlah_pertemuan').val();
            tampilkan_jadwal(pertemuan);
           
        })
        

        $('#btn-promo').click(function(){
            var promo = $('#promo').val();
            var total_harga = $('#total_harga_hidden').val();
            $.ajax({
                url: '/siswa/cariguru/checkout/promo/' + promo,
                type: "GET",
                dataType: 'JSON',
                success: function( data, textStatus, jQxhr ){

                    if (data.promo == 'Kosong'){
                        $('#keterangan_diskon').html('Kode promo tidak ditemukan');
                    }

                    else{
                        $('#keterangan_diskon').html('Kode valid');
                        var last_price = total_harga - (data.promo / 100 * total_harga);
                        $('#total_harga_akhir').html('Rp' + rubah(last_price));
                    }
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    alert('terjadi error');
                },
            })
        });

        function rubah(angka){
            var reverse = angka.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            return ribuan;
        }
    </script>

    <script type="text/javascript">
    
    $('#button_lanjutkan_pembayaran').click(function(){

       var _token = $('meta[name="csrf-token"]').attr('content');
       var last_price = $('#total_harga_hidden').val();
       var jenjang_id = $('#jenjang_id').val();
       var kurikulum_id = $('#kurikulum_id').val();
       var mapel_id = $('#mapel_id').val();
       var pilihan_guru = $('#pilihan_guru').val();

        var jumlah_orang = [];
        var durasi_pertemuan = [];
        var tanggal_pertemuan = [];
        var harga = [];

        var pertemuan = $('#jumlah_pertemuan').val();
        $('#place_detail_harga').show();
        $('#total_pertemuan').html(pertemuan);

        for (var i = 0; i < counter; i++) {
            jumlah_orang.push($('#jumlah_orang'+i).val());
            durasi_pertemuan.push($('#durasi_pertemuan'+i).val());
            tanggal_pertemuan.push($('#tanggal_pertemuan'+i).val());
            harga.push($('#harga'+i).val());
        }


       $(this).attr("disabled", true);
       $(this).html(`LANJUTKAN PEMBAYARAN <i class="fa fa-spinner fa-spin"></i>`);

        $.ajax({
            url: '/siswa/cariguru/lanjutkan_pembayaran',
            type: 'post',
            data:{_token:_token,last_price:last_price,jenjang_id:jenjang_id,kurikulum_id:kurikulum_id,mapel_id:mapel_id,
                jumlah_orang:jumlah_orang,durasi_pertemuan:durasi_pertemuan,tanggal_pertemuan:tanggal_pertemuan,harga:harga,
                pilihan_guru:pilihan_guru},
            dataType: 'json',
            success: function(response){
               $('#button_lanjutkan_pembayaran').attr("disabled", false);
               $('#button_lanjutkan_pembayaran').html(`LANJUTKAN PEMBAYARAN`);

               if(response.status=='success'){
                    location.href = "/siswa/transaksi/";
               }

            },
             error: function (request, status, error) {
                alert(request.responseText);
                $('#button_lanjutkan_pembayaran').attr("disabled", false);
                $('#button_lanjutkan_pembayaran').html(`LANJUTKAN PEMBAYARAN`);
            }

        });

      
    });    

    </script>


@endsection