@extends('tentor.template.master')

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
            <div class="card-header">
                <h4 class="card-title">Pencairan Dana</h4>
            </div>
            <div class="card-body">
                <button class="btn btn-danger mb-3" style="background-color:#E51453" onclick="pencairan()"> <i class="fa fa-plus"></i> Pencairan Dana</button>
                <div class="table-responsive">
                    <div class="table-responsive">
                        <table class="table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>TANGGAL</th>
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
                                        <td>{{"Rp " . number_format($item->jumlah,0,',','.')}}</td>
                                        <td>{{$item->nama_bank}}</td>
                                        <td>{{$item->nama_pemilik}}</td>
                                        <td class="text-center">
                                            @if($item->status == 'diproses')
                                            <span class="badge badge-warning text-white">{{$item->status}}</span>
                                            @elseif($item->Status == 'berhasil')
                                            <span class="badge badge-success text-white">{{$item->status}}</span>
                                            @else
                                            <span class="badge badge-danger text-white">{{$item->status}}</span>
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
        function pencairan(){
            $('#modal_add_pencairan').modal('show');
        }
    </script>
@endsection

<div class="modal fade" id="modal_add_pencairan" aria-hidden="true" role="dialog">
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pencairan Dana</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">   
                <form action="{{route('tentor.pencairan.store')}}" method="POST">
                    @csrf
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h5 style="color:#E51453">Saldo Anda : {{"Rp " . number_format($saldo->saldo,2,',','.')}}</h5>    
                    </div>    
                </div> 
                <hr> 
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Akun Rekening</label>
                            <select name="rekening_id" class="form-control">
                                @foreach ($rekening as $item)
                                    <option value="{{$item->id}}">{{$item->nama_bank}} - <small>{{$item->nama_pemilik}}</small></option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Nama Mitra</label>
                            <input type="text" class="form-control" value="{{session()->get('nama')}}" readonly>
                        </div>
                    </div>   
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Email Akun Mitra</label>
                            <input type="text" class="form-control" value="{{session()->get('email')}}" readonly>
                        </div>
                    </div>   
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Input Nominal</label>
                            <input type="number" min="1" max="{{$saldo->saldo}}" class="form-control" name="jumlah" required>
                        </div>
                    </div>      
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-danger btn-block" style="background-color:#E51453">Pencairan Dana</button>
                    </div>   
                </div>  
            </form> 
            </div>
        </div>
    </div>
</div>


