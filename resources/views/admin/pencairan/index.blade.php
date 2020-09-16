@extends('admin.template.master')

@section('title','Pencairan Dana')

@section('content')
    <div class="col-md-12 col-lg-12">

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
                <div class="table-responsive">
                    <div class="table-responsive">
                        <table class="table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>TANGGAL</th>
                                    <th>INVOICE</th>
                                    <th>JUMLAH PENCAIRAN</th>
                                    <th>KE REKENING</th>
                                    <th>NAMA PEMILIK REKENING</th>
                                    <th class="text-center">STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{date('d/m/Y', strtotime($item->tanggal))}}</td>
                                        <td>{{$item->no_invoice}}</td>
                                        <td>{{"Rp " . number_format($item->jumlah,0,',','.')}}</td>
                                        <td>{{$item->nama_bank}}</td>
                                        <td>{{$item->nama_pemilik}}</td>
                                        <td class="text-center">
                                            @if($item->status == 'diproses')
                                            <button class="btn bg-warning-light" onclick="show_approval({{$item->id}})">{{$item->status}}</button>
                                            @elseif($item->status == 'berhasil')
                                            <button class="btn bg-success-light" style="cursor: not-allowed" disabled>{{$item->status}}</button>
                                            @else
                                            <button class="btn bg-danger-light" style="cursor: not-allowed" disabled>{{$item->status}}</button>
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
    </div>
@endsection

@section('js')
    <script>
        function show_approval(id){
            $('#approval').modal('show');
            $('#id_approved').val(id);
            $('#id_reject').val(id);
        }
    </script>
@endsection

<div id="approval" class="modal fade bs-modal-lg" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog custom-modal-size-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <center>
                        <h4>Pastikan pilihan anda !</h4>
                    </center>
                    <hr>
                    <center>
                        <div class="dash text-center"><h6 style="margin-bottom:0 !important"> <b>Pastikan anda memilih action yang tepat karena pilihan tidak dapat dirubah</b></h6></div>
                    </center>
                   
                    <div class="row" style="margin-top: 25px;margin-left:10px;margin-right:10px">
                        <div class="col-md-12">
                            <form id="approve" action="{{route('admin.pencairan.approve')}}" method="POST">
                                @method('put')
                                @csrf
                                <input type="hidden" id="id_approved" name="id">
                                <button type="submit" class="btn btn-success btn-block btn-sm">Approve</button>
                            </form>
                        </div>
                        <div class="col-md-12" style="margin-top:-10px">
                            <form id="reject" action="{{route('admin.pencairan.reject')}}" method="POST">
                                @method('put')
                                @csrf
                                <input type="hidden" id="id_reject" name="id">
                                <button type="submit" class="btn btn-danger btn-block btn-sm">Reject</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
