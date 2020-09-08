@extends('siswa.template.master')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="invoice-content">
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-logo">
                                    <img src="{{asset('logo/logo.png')}}" alt="logo">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="invoice-details">
                                    <strong>Order:</strong> {{$total->kode_transaksi}} <br>
                                    <strong>Date:</strong> {{date('d/m/Y')}}
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Invoice Item -->
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-info">
                                    <strong class="customer-text">Invoice From</strong>
                                    <p class="invoice-details invoice-details-two">
                                        PT.Cariguru Indonesia<br>
                                        Jl. Gayungsari Barat no 24<br>
                                        Surabaya, Jawa Timur <br>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="invoice-info invoice-info2">
                                    <strong class="customer-text">Invoice To</strong>
                                    <p class="invoice-details">
                                        {{$siswa->nama}} <br>
                                        {{$siswa->alamat}} <br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->
                    
                    {{-- <!-- Invoice Item -->
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="invoice-info">
                                    <strong class="customer-text">Payment Method</strong>
                                    <p class="invoice-details invoice-details-two">
                                        Debit Card <br>
                                        XXXXXXXXXXXX-2541 <br>
                                        HDFC Bank<br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item --> --}}
                    
                    <!-- Invoice Item -->
                    <div class="invoice-item invoice-table-wrap">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="invoice-table table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th class="text-center">Jumlah Murid</th>
                                                <th class="text-center">Durasi</th>
                                                <th class="text-right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transaksi as $item)
                                            <tr>        
                                                <td>{{$item->judul}}</td>
                                                <td class="text-center">{{$item->jumlah_orang}}</td>
                                                <td class="text-center">{{$item->durasi}}</td>
                                                <td class="text-right">{{"Rp " . number_format($item->biaya,2,',','.')}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4 ml-auto">
                                <div class="table-responsive">
                                    <table class="invoice-table-two table">
                                        <tbody>
                                        {{-- <tr>
                                            <th>Subtotal:</th>
                                            <td><span>$350</span></td>
                                        </tr>
                                        <tr>
                                            <th>Discount:</th>
                                            <td><span>-10%</span></td>
                                        </tr> --}}
                                        <tr>
                                            <th>Total Amount:</th>
                                            <td><span>{{"Rp " . number_format($total->total_biaya,2,',','.')}}</span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->
                    
                    <!-- Invoice Information -->
                    <div class="other-info">
                        <h4>Other information</h4>
                        <p class="text-muted mb-0">Jangan lupa untuk menyimpan bukti transfer yang nantinya jadi bukti untuk validasi admin Cariguru</p>
                    </div>
                    <!-- /Invoice Information -->
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="invoice-content">
                    <div class="invoice-item">
                        <div class="row">
							<div class="col-md-1 mt-4">
								<img src="{{asset('bca.png')}}" width="100%"  alt="">
							</div>
							<div class="col-md-3">
								<div class="form-group card-label">
									<label for="card_name">Bank</label>
									<input class="form-control" id="card_name" value="BANK MANDIRI" type="text" readonly>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group card-label">
									<label for="card_number">No Rekening</label>
									<input class="form-control" id="card_number" value="1234567889" type="text" readonly>
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group card-label">
									<label for="card_number">Atas Nama</label>
									<input class="form-control" id="card_number" value="PT. CARI GURU Tbk" type="text" readonly>
								</div>
							</div>
                        </div>
                        <div class="row">
							<div class="col-md-1 mt-4">
								<img src="{{asset('bca.png')}}" width="100%"  alt="">
							</div>
							<div class="col-md-3">
								<div class="form-group card-label">
									<label for="card_name">Bank</label>
									<input class="form-control" id="card_name" value="BANK MANDIRI" type="text" readonly>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group card-label">
									<label for="card_number">No Rekening</label>
									<input class="form-control" id="card_number" value="1234567889" type="text" readonly>
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group card-label">
									<label for="card_number">Atas Nama</label>
									<input class="form-control" id="card_number" value="PT. CARI GURU Tbk" type="text" readonly>
								</div>
							</div>
                        </div>
                        <div class="row">
							<div class="col-md-1 mt-4">
								<img src="{{asset('bca.png')}}" width="100%"  alt="">
							</div>
							<div class="col-md-3">
								<div class="form-group card-label">
									<label for="card_name">Bank</label>
									<input class="form-control" id="card_name" value="BANK MANDIRI" type="text" readonly>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group card-label">
									<label for="card_number">No Rekening</label>
									<input class="form-control" id="card_number" value="1234567889" type="text" readonly>
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group card-label">
									<label for="card_number">Atas Nama</label>
									<input class="form-control" id="card_number" value="PT. CARI GURU Tbk" type="text" readonly>
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