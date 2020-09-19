@extends('siswa.template.master')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Jadwal Les</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-solid nav-justified">
                            <li class="nav-item"><a class="nav-link active" href="#solid-justified-tab1" data-toggle="tab">Transaksi</a></li>
                            <li class="nav-item"><a class="nav-link" href="#solid-justified-tab2" data-toggle="tab">Berhasil</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="solid-justified-tab1">
                                <div class="table-responsive">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th>MENTEE LISTS</th>
                                                    <th>MATA PELAJARAN</th>
                                                    <th>TANGGAL</th>
                                                    <th class="text-center">WAKTU</th>
                                                    <th class="text-center">STATUS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($transaksi as $item)
                                                <tr>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('foto_guru/'.$item->foto_profil)}}" alt="User Image"></a>
                                                            <a href="profile.html">{{$item->nama}}<span>{{$item->email}}</span></a>				
                                                        </h2>
                                                    </td>
                                                    <td>{{$item->judul}}</td>
                                                    <td>{{date("d F Y",strtotime($item->tanggal_pertemuan))}}</td>
                                                    <td class="text-center"><span class="pending">{{date("H:i:s",strtotime($item->tanggal_pertemuan))}}</span></td>
                                                    <td class="text-center"><span class="badge badge-success">{{$item->status}}</span></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>		
                                    </div>
                                </div>
                            </div>
            
                            <div class="tab-pane show" id="solid-justified-tab2">
                                <div class="table-responsive">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th>MENTEE LISTS</th>
                                                    <th>MATA PELAJARAN</th>
                                                    <th>TANGGAL</th>
                                                    <th class="text-center">WAKTU</th>
                                                    <th class="text-center">STATUS</th>
                                                    <th class="text-center">ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($berhasil as $item)
                                                <tr>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('foto_guru/'.$item->foto_profil)}}" alt="User Image"></a>
                                                            <a href="profile.html">{{$item->nama}}<span>{{$item->email}}</span></a>				
                                                        </h2>
                                                    </td>
                                                    <td>{{$item->judul}}</td>
                                                    <td>{{date("d F Y",strtotime($item->tanggal_pertemuan))}}</td>
                                                    <td class="text-center"><span class="pending">{{date("H:i:s",strtotime($item->tanggal_pertemuan))}}</span></td>
                                                    <td class="text-center"><span class="badge badge-success">{{$item->status}}</span></td>
                                                    <td class="text-center"><button type="button" onclick="show_link('{{$item->link_meeting}}')" class="btn btn-sm bg-info-light"><i class="far fa-eye"></i> View Link</button></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>			
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $('#table1').dataTable();
        $('#table2').dataTable();

        function show_link(link){
            $('#modal_link_meeting').modal('show');
            $('#link_meeting').val(link);
        }

        function copyToClipboard() {
            $('#link_meeting').select();
            document.execCommand('copy');
        }
    </script>   
@endsection

<div class="modal fade" id="modal_link_meeting" aria-hidden="true" role="dialog">
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Input Link Meeting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">     
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label>Link Meeting</label>
                            <input type="text" class="form-control" id="link_meeting" readonly>
                        </div>
                    </div>   
                    <div class="col-sm-2" style="margin-top:30px;margin-left:-10px">
                        <button class="btn btn-primary" onclick="copyToClipboard()">Copy</button>
                    </div>   
                </div>   
            </div>
        </div>
    </div>
</div>