@extends('admin.template.master')

@section('title','Transaksi')

@section('content')

<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="datatable table table-hover table-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Siswa</th>
                            <th class="text-center">Jumlah Siswa</th>
                            <th class="text-center">Durasi</th>
                            <th class="text-center">Total Pembayaran</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $item)
                        <tr>
                            <td><a href="invoice.html">#00{{$item->id}}</a></td>
                            <td>{{$item->nama}}</td>
                            <td class="text-center">{{$item->jumlah_orang}}</td>
                            <td class="text-center">{{$item->durasi}}</td>
                            <td class="text-center">{{$item->total_biaya}}</td>
                            <td class="text-center">
                         
                                <span class="badge badge-pill  @if($item->status == 'menunggu pembayaran') bg-warning @else bg-success @endif inv-badge">{{$item->status}}</span>
                            </td>
                            <td class="text-center">
                                <div class="actions">
                                    <a data-toggle="modal" href="#edit_invoice_report" class="btn btn-sm bg-success-light mr-2">
                                        <i class="fe fe-check"></i> Konfirmasi
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>		
@endsection