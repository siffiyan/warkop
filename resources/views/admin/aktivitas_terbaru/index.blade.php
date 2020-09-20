@extends('admin.template.master')

@section('title','Aktivitas Terbaru')

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Transaksi</h4>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-solid nav-justified">
            <li class="nav-item"><a class="nav-link active" href="#solid-justified-tab1" data-toggle="tab">Aktivitas User</a></li>
            <li class="nav-item"><a class="nav-link" href="#solid-justified-tab2" data-toggle="tab">Aktivitas Transaksi</a></li>
            </ul>

            <br>

            <div class="tab-content">

                <div class="tab-pane show active" id="solid-justified-tab1">

                        <div class="table-responsive">
                            <table class="datatable table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>No Handphone</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswa as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->username}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->no_hp}}</td>
                                            <td class="text-center">
                                                @if ($item->verified == 0)
                                                    <span class="badge badge-danger">Not Verified</span>
                                                @elseif($item->verified == '1')
                                                    <span class="badge badge-success">Verified</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                {{$item->created_at}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                </div>

                <div class="tab-pane" id="solid-justified-tab2">

                    <div class="table-responsive">
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Kode Transaksi</th>
                                    <th>Siswa</th>
                                    <th>Mata Pelajaran</th>
                                    <th class="text-center">Status</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->kode_transaksi}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->judul}}</td>
                                        <td class="text-center">
                      
                                                <span class="badge badge-pill  @if($item->status == 'menunggu pembayaran') bg-warning @else bg-success @endif inv-badge">{{$item->status}}</span>
                                         
                                        </td>
                                        <td>{{$item->created_at}}</td>
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
@endsection