@extends('admin.template.master')

@section('title','Manajemen Transaksi')

@section('css')

<style type="text/css">
.nav-tabs.nav-tabs-solid > li > a.active, .nav-tabs.nav-tabs-solid > li > a.active:hover, .nav-tabs.nav-tabs-solid > li > a.active:focus {
background-color: #3dd598 !important;
border-color: #3dd598 !important;
color: #fff;
}
}
</style>
@endsection


@section('content')

<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Transaksi</h4>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-solid nav-justified">
            <li class="nav-item"><a class="nav-link active" href="#solid-justified-tab1" data-toggle="tab">Belum Dibayar ( {{$transaksi->where('status','menunggu_pembayaran')->count() }} )</a></li>
            <li class="nav-item"><a class="nav-link" href="#solid-justified-tab2" data-toggle="tab">Sudah Dibayar ( {{$transaksi->where('status','sudah_dibayar')->count() }} )</a></li>
            <li class="nav-item"><a class="nav-link" href="#solid-justified-tab3" data-toggle="tab">Pending ( {{$transaksi->where('status','pending')->count() }} )</a></li>
            <li class="nav-item"><a class="nav-link" href="#solid-justified-tab4" data-toggle="tab">Berhasil ( {{$transaksi->where('status','berhasil')->count() }} )</a></li>
            <li class="nav-item"><a class="nav-link" href="#solid-justified-tab5" data-toggle="tab">Konfirmasi Pembayaran ( {{$transaksi->where('status','konfirmasi_pembayaran')->count() }} )</a></li>
            </ul>

            <br>

            <div class="tab-content">

            <div class="tab-pane show active" id="solid-justified-tab1">

            <div class="table-responsive">
                <table class="datatable table table-hover table-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Kode Transaksi</th>
                            <th>Siswa</th>
                            <th class="text-center">Mata Pelajaran</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                     @foreach ($menunggu_pembayaran as $item)
                        <tr>   
                            <td>{{$loop->iteration}}</td>
                            <td><a href="/siswa/pembayaran/detail/{{$item->id}}" target="_blank">{{$item->kode_transaksi}}</a></td>
                            <td>{{$item->nama}}</td>
                            <td class="text-center">{{$item->judul}}</td>
                            <td class="text-center">
                         
                                <span class="badge badge-pill  @if($item->status == 'menunggu pembayaran') bg-warning @else bg-success @endif inv-badge">{{$item->status}}</span>
                            </td>
                            <td class="text-center">
                                <div class="actions">
                                    <button onclick="konfirmasi_pembayaran({{$item->id}})" class="btn btn-sm bg-success-light mr-2"><i class="fe fe-check"></i> Konfirmasi</button>
                                </div>
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
                            <th class="text-center">Mata Pelajaran</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                     @foreach ($sudah_dibayar as $item)
                        <tr>   
                            <td>{{$loop->iteration}}</td>
                            <td><a href="/siswa/pembayaran/detail/{{$item->id}}" target="_blank">{{$item->kode_transaksi}}</a></td>
                            <td>{{$item->nama}}</td>
                            <td class="text-center">{{$item->judul}}</td>
                            <td class="text-center">
                         
                                <span class="badge badge-pill  @if($item->status == 'menunggu pembayaran') bg-warning @else bg-success @endif inv-badge">{{$item->status}}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <div class="tab-pane" id="solid-justified-tab3">

             <div class="table-responsive">
                <table class="datatable table table-hover table-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Kode Transaksi</th>
                            <th>Siswa</th>
                            <th class="text-center">Mata Pelajaran</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                     @foreach ($pending as $item)
                        <tr>   
                            <td>{{$loop->iteration}}</td>
                            <td><a href="/siswa/pembayaran/detail/{{$item->id}}" target="_blank">{{$item->kode_transaksi}}</a></td>
                            <td>{{$item->nama}}</td>
                            <td class="text-center">{{$item->judul}}</td>
                            <td class="text-center">
                         
                                <span class="badge badge-pill  @if($item->status == 'menunggu pembayaran') bg-warning @else bg-success @endif inv-badge">{{$item->status}}</span>
                            </td>
                            <td class="text-center">
                                <div class="actions">
                                    <a href="/admin/transaksi/{{$item->id}}"><button class="btn btn-sm bg-success-light mr-2"> Detail</button></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

         <div class="tab-pane" id="solid-justified-tab4">

             <div class="table-responsive">
                <table class="datatable table table-hover table-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Kode Transaksi</th>
                            <th>Siswa</th>
                            <th class="text-center">Mata Pelajaran</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                     @foreach ($berhasil as $item)
                        <tr>   
                            <td>{{$loop->iteration}}</td>
                            <td><a href="/siswa/pembayaran/detail/{{$item->id}}" target="_blank">{{$item->kode_transaksi}}</a></td>
                            <td>{{$item->nama}}</td>
                            <td class="text-center">{{$item->judul}}</td>
                            <td class="text-center">
                         
                                <span class="badge badge-pill  @if($item->status == 'menunggu pembayaran') bg-warning @else bg-success @endif inv-badge">{{$item->status}}</span>
                            </td>
                            <td class="text-center">
                                <div class="actions">
                                    <a href="/admin/transaksi/{{$item->id}}"><button class="btn btn-sm bg-success-light mr-2"> Detail</button></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

         <div class="tab-pane" id="solid-justified-tab5">

        </div>

        </div>

        </div>
    </div>
</div>

<!-- Modal Konfirmasi Pembayaran -->
<form action="/admin/transaksi/change_status/sudah_dibayar" method="post">
{{csrf_field()}}
<div class="modal fade" id="modal_konfirmasi_pembayaran" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <div class="form-content p-2">
                    <h4 class="modal-title">Konfirmasi</h4>
                    <input type="hidden" name="id_transaksi" id="id_transaksi">
                    <p class="mb-4">Apakah anda yakin transaksi ini sudah dibayar ?</p>
                    <button type="submit" class="btn btn-primary">Iya </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<!-- Modal Konfirmasi Pembayaran -->

@endsection

@section('js')

<script type="text/javascript">
    
    function konfirmasi_pembayaran(id){

        $('#id_transaksi').val(id);
        $('#modal_konfirmasi_pembayaran').modal('show');

    }

</script>

@endsection