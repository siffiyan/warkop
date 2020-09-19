@extends('tentor.template.master')

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

    <button class="btn btn-danger mb-3" style="background-color:#E51453" onclick="add_bank()"> <i class="fa fa-plus"></i> Tambah Rekening</button>
    
    
    <div class="row row-grid">
        @foreach ($rekening as $item)
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="card widget-profile user-widget-profile">
                <div class="card-body">
                    <div class="pro-widget-content">
                        <div class="profile-info-widget">
                            <div class="profile-det-info">
                                <h3><a href="profile-mentee.html">{{$item->nama_bank}}</a></h3>
                                <div class="mentee-details">
                                    <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> {{$item->cabang}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mentee-info">
                        <ul>
                            <li>Nama<span>{{$item->nama_pemilik}}</span></li>
                            <li>Rekening <span>{{$item->nomor_rekening}}</span></li>
                        </ul>
                    </div>
                    <br>
                    <button type="button" class="btn btn-info btn-sm btn-block" onclick="edit('{{$item->id}}')">Edit</button>
                    <button class="btn btn-danger btn-sm btn-block" onclick="delete_rekening({{$item->id}})">Delete</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('js')
    <script>
        function add_bank(){
            $('#modal_tambah_bank').modal('show');
        }

        function edit(id){
            $.ajax({
                url: '/tentor/bank/detail/'+id,
                type: "GET",
                dataType: 'JSON',
                success: function( data, textStatus, jQxhr ){
                    $('#modal_edit_bank').modal('show');
                    $('#id').val(data.id);
                    $('#nama_bank').val(data.nama_bank);
                    $('#cabang').val(data.cabang);
                    $('#nomor_rekening').val(data.nomor_rekening);
                    $('#nama_pemilik').val(data.nama_pemilik);
                },
                error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
                console.warn(jqXhr.responseText);
                },
            });
        }

        function delete_rekening(id){
            $('#modal_delete').modal('show');
            $('#id_delete').val(id);
        }
    </script>
@endsection

<div class="modal fade" id="modal_tambah_bank" aria-hidden="true" role="dialog">
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Bank</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">   
                <form action="{{route('tentor.bank.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Bank</label>
                            <select name="nama_bank" class="form-control">
                                @foreach ($bank as $item)
                                    <option value="{{$item->name}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Cabang</label>
                            <input type="text" class="form-control" name="cabang"required>
                        </div>
                    </div>   
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>No Rekening</label>
                            <input type="text" class="form-control" name="nomor_rekening"required>
                        </div>
                    </div>   
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Nama Pemilik</label>
                            <input type="text" class="form-control" name="nama_pemilik"required>
                        </div>
                    </div>      
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-danger btn-block" style="background-color:#E51453">Save Changes</button>
                    </div>   
                </div>  
            </form> 
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_edit_bank" aria-hidden="true" role="dialog">
    <div class="modal-dialog" role="document" >
        <form action="{{route('tentor.bank.update')}}" method="POST">
            @method('put')
            @csrf
        <input type="hidden" name="id" id="id">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Bank</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">   
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Bank</label>
                            <select name="nama_bank" id="nama_bank" class="form-control">
                                @foreach ($bank as $item)
                                    <option value="{{$item->name}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Cabang</label>
                            <input type="text" class="form-control" name="cabang" id="cabang" required>
                        </div>
                    </div>   
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>No Rekening</label>
                            <input type="text" class="form-control" name="nomor_rekening" id="nomor_rekening" required>
                        </div>
                    </div>   
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Nama Pemilik</label>
                            <input type="text" class="form-control" name="nama_pemilik" id="nama_pemilik" required>
                        </div>
                    </div>      
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-danger btn-block" style="background-color:#E51453">Save Changes</button>
                    </div>   
                </div>   
            </div>
        </div>
        </form>
    </div>
</div>

<!-- Delete Model -->
<div class="modal fade" id="modal_delete" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-body">
                <form action="{{route('tentor.bank.delete')}}" method="POST">
                    @method('delete')
                    @csrf
                <div class="form-content p-2">
                    <h4 class="modal-title">Delete</h4>
                    <input type="hidden" name="id" id="id_delete">
                    <p class="mb-4">Are you sure want to delete?</p>
                    <button type="submit" class="btn btn-primary">Delete </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Delete Model -->