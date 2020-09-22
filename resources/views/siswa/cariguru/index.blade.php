@extends('siswa.template.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('star/src/css/star-rating-svg.css')}}">
@endsection

@section('content')

<form action="/siswa/cariguru/checkout" method="post">
{{csrf_field()}}

<div class="row">

    <!-- Search Mentor -->

    <div class="col-md-12">
    
            <div class="row">

            <div class="col-md-3">
            <div class="filter-widget">
                <h4>Pilih Jenjang</h4>
                <select name="jenjang" id="jenjang_list" class="form-control">
                    @foreach ($jenjang as $item)
                        <option value="{{$item->id}}">{{$item->jenjang}}</option>
                    @endforeach
                    
                </select>
            </div>
            </div>

            <div class="col-md-3">
            <div class="filter-widget">
                <h4>Pilih Kurikulum</h4>
                <select name="kurikulum" id="kurikulum_list" class="form-control">
                    @foreach ($kurikulum as $item)
                        <option value="{{$item->id}}">{{$item->kurikulum}}</option>
                    @endforeach
                </select>
            </div>
            </div>

            <div class="col-md-3">
            <div class="filter-widget">
                <h4>Pilih Mata Pelajaran</h4>
                <select name="mapel" id="mapel_list" class="form-control">
                   
                </select>		
            </div>
            </div>

            <div class="col-md-3">
            <div class="btn-search">
                    <button type="button" class="btn btn-block" id="search" style="margin-top: 27px;">Search</button>
            </div>  
            </div>

            </div>
        
    </div>

    <!-- Search Mentor -->

    
    <!-- List Guru -->

    <div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar" id="place_filter" style="display: none;">

    <div class="card search-filter">
    <div class="card-header">
    <h4 class="card-title mb-0">Urutkan hasil pencarian</h4>
    </div>
    <div class="card-body">
    <div class="filter-widget">
    <div>
    <label class="custom_check">
    <input type="checkbox" name="gender_type">
    <span class="checkmark"></span> Rating Tertinggi
    </label>
    </div>
    <div>
    <label class="custom_check">
    <input type="checkbox" name="gender_type">
    <span class="checkmark"></span> Poin Tertinggi
    </label>
    </div>
    </div>
    </div>
    </div>

    <input type="hidden" name="pilihan_guru" id="pilihan_guru">

    <div class="btn-search">
        <button type="submit" class="btn btn-block" id="button_pemesanan" style="background: #e51453;border: 1px solid #e51453; ">Lanjutkan Pemesanan</button>
    </div>

    

    </div>

    <div class="col-md-12 col-lg-8 col-xl-9">

        <div id="card-guru">
   
        </div>

    </div>

    <!-- List Guru -->

</div>

</form>

@endsection

@section('js')
<script src="{{asset('star/src/jquery.star-rating-svg.js')}}"></script>
    <script>

        var temp = "";

        $('#card-guru').on('click','.pilih_guru', function(e){
        e.preventDefault();
         
        if($(this).data("terpilih") == 'false') $(this).data('terpilih', 'true');
        else $(this).data('terpilih', 'false');
        
        if($(this).data("terpilih") == 'true'){
             $(this).html('PILIH GURU <i class="fas fa-check"></i>');
             $(this).css({"background-color":"green","border":"1px solid green"});
             if(temp) temp = temp.concat("|",$(this).data("id"));
             else temp = temp.concat($(this).data("id"));
             $('#pilihan_guru').val(temp);
        }

        else{
            $(this).html('PILIH GURU');
            $(this).css({"background-color":"","border":""});
            temp = removeItem(temp,$(this).data("id"));
            $('#pilihan_guru').val(temp);
        
        }
         
        });

        function removeItem(string, item){

            var split = string.split('|');
            var temp ="";

            for(var i=0;i<split.length;i++){
                if(split[i]==item) split.splice(i,1);
                else if(temp) temp = temp.concat("|",split[i]); else temp = temp.concat(split[i]);
            }

           return temp;

        }

        $(document).ready(function(){
            mapel_list('1','1');
            $('#kurikulum_list').val(1);
        })

        $('#jenjang_list').change(function(){
            var jenjang = $('#jenjang_list').val();
            var kurikulum = $('#kurikulum_list').val();
            mapel_list(jenjang,kurikulum);
        });

        $('#kurikulum_list').change(function(){
            var jenjang = $('#jenjang_list').val();
            var kurikulum = $('#kurikulum_list').val();
            mapel_list(jenjang,kurikulum);
        });

        function mapel_list(jenjang,kurikulum){
            $.ajax({
                url: '/siswa/cariguru/filter/' + jenjang + '/' + kurikulum,
                type: "GET",
                dataType: 'JSON',
                success: function( data, textStatus, jQxhr ){
                    $('#mapel_list').empty();
                    $.each(data.mapel,function(i,value){
                        $('#mapel_list').append(`<option value="`+value.id+`">`+value.mata_pelajaran+`</option>`);
                    });
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    console.log( errorThrown );
                    console.warn(jqXhr.responseText);
                },
            })
        }

        $('#search').click(function(){
            var jenjang = $('#jenjang_list').val();
            var kurikulum = $('#kurikulum_list').val();
            var mapel = $('#mapel_list').val();
            $.ajax({
                url: '/siswa/cariguru/action_filter/' + jenjang + '/' + kurikulum + '/' + mapel,
                type: "GET",
                dataType: 'JSON',
                success: function( data, textStatus, jQxhr ){
                    
                    $('#place_filter').show();
                    $a = 0;
                    $('#card-guru').empty();
                    if (!$.trim(data.guru)){   
                            $('#card-guru').html(`
                                <div style="border:2px dashed black;padding: 25px;text-align: center;">
                                    Tidak dapat menemukan guru
                                </div>
                            `);
                        }else{
                         $.each(data.guru,function(i,value){
                             console.log(value);
                            $('#card-guru').append(`
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mentor-widget">
                                            <div class="user-info-left">
                                                <div class="mentor-img">
                                                    <a href="profile.html">
                                                        <img src="{{asset('/foto_guru/`+value.foto_profil+`')}}" class="img-fluid" alt="User Image">
                                                    </a>
                                                </div>
                                                <div class="user-info-cont">
                                                    <h4 class="usr-name"><a href="/siswa/cariguru/profil_tentor/`+value.id+`">`+value.nama+`</a></h4>
                                                    <p class="mentor-type">`+value.nama_institusi+`</p>
      
                                                    <div class="my-rating-${$a}" data-rating="`+value.penilaian+`"></div>
                                                </div>
                                            </div>
                                            <div class="user-info-right">
                                                <div class="user-infos">
                                                    <ul>
                                                        <li><i class="far fa-comment"></i> `+value.feedback+` Feedback</li>
                                                        <li><i class="fas fa-map-marker-alt"></i> `+value.alamat_domisili+`</li>
                                                        <li><i class="far fa-money-bill-alt"></i> Rp.100.000/Meet <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i> </li>
                                                    </ul>
                                                </div>
                                                <div class="mentor-booking">
                                                    <a class="apt-btn pilih_guru" data-terpilih="false" data-id="`+value.id+`" href="#">Pilih Guru</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `);

                            $(".my-rating-"+$a).starRating({
                                totalStars: 5,
                                starShape: 'rounded',
                                readOnly: true,
                                starSize: 25,
                                emptyColor: 'lightgray',
                                hoverColor: 'salmon',
                                activeColor: 'crimson',
                                useGradient: false
                            });

                            $a++;
                       
                        });
                    }
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    console.log( errorThrown );
                    console.warn(jqXhr.responseText);
                },
            })
        });

    </script>

@endsection