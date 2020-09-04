@extends('admin.template.master')

@section('title', 'Blog')

@section('css')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/> 
@endsection

@section('content')

<style>
    .dash{
        padding: 20px;
        border: 2px dashed #b7c9cc;
        color: #738f93;
    }

    .nav-tabs.nav-tabs-solid > li > a.active, .nav-tabs.nav-tabs-solid > li > a.active:hover, .nav-tabs.nav-tabs-solid > li > a.active:focus {
            background-color: #3dd598 !important;
            border-color: #3dd598 !important;
            color: #fff;
        }
    }
</style>

<div class="col-md-12">

    <a href="{{route('blogAdmin.create')}}" class="btn btn-primary mb-3"><i class="fe fe-plus"></i> &nbsp; Tambah Blog</a>

    <div class="alertAjax"></div>

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
            <h4 class="card-title">Data User</h4>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-solid nav-justified">
                <li class="nav-item"><a class="nav-link active" href="#solid-justified-tab1" data-toggle="tab">Blog Mentor</a></li>
                <li class="nav-item"><a class="nav-link" href="#solid-justified-tab2" data-toggle="tab">Blog Super Admin</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane show active" id="solid-justified-tab1">
                    <div class="table-responsive">
                        <table class="datatable table table-stripped" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Judul Blog</th>
                                    <th>Kategori</th>
                                    <th>Creator</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Keterangan</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($blog_tentor as $a)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td width="15%"> <a href="/berkas/blog/{{$a->image}}" target="_blank"><img src="{{asset('berkas/blog/'.$a->image)}}" class="make_bigger" width="100px" height="100px" alt=""></a></td>
                                    <td>{{$a->judul}}</td>
                                    <td>{{$a->kategori}}</td>
                                    <td>{{$a->nama}}</td>
                                    <td class="text-center">
                                        @if($a->isactive == '1')
                                            <button type="button" class="btn btn-success btn-sm" onclick="inactive({{$a->id}})"> <i class="fa fa-check"></i></button>
                                        @elseif($a->isactive == '0')
                                            <button class="btn btn-danger btn-sm" onclick="active({{$a->id}})"> <i class="fa fa-times"></i></button>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($a->status == 'pending')
                                            <a onclick="approval({{$a->id.','.$a->created_by}})" class="badge badge-pill bg-warning inv-badge text-white" style="cursor:pointer">pending</a>
                                            @elseif($a->status == 'approve')
                                            <a class="badge badge-pill bg-success inv-badge text-white" style="cursor: not-allowed">approve</a>
                                            @else
                                            <a class="badge badge-pill bg-danger inv-badge text-white" style="cursor: not-allowed">reject</a>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('blogAdmin.show',$a->id)}}" class="btn btn-info"><i class="fe fe-eye"></i></a>
                                        <a href="{{route('blogAdmin.edit',$a->id)}}" class="btn btn-success"><i class="fe fe-pencil"></i></a>
                                        <button class="btn btn-danger" onclick="hapus({{$a->id}})"><i class="fe fe-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane show" id="solid-justified-tab2">
                    <div class="table-responsive">
                        <table class="datatable table table-stripped" id="table2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Judul Blog</th>
                                    <th>Kategori</th>
                                    <th>Creator</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($blog_admin as $a)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td width="15%"> <a href="/berkas/blog/{{$a->image}}" target="_blank"><img src="{{asset('berkas/blog/'.$a->image)}}" class="make_bigger" width="100px" height="100px" alt=""></a></td>
                                    <td>{{$a->judul}}</td>
                                    <td>{{$a->kategori}}</td>
                                    <td>{{$a->created_by}}</td>
                                    <td class="text-center">
                                        @if($a->isactive == '1')
                                            <button type="button" class="btn btn-success btn-sm" onclick="inactive({{$a->id}})"> <i class="fa fa-check"></i></button>
                                        @elseif($a->isactive == '0')
                                            <button class="btn btn-danger btn-sm" onclick="active({{$a->id}})"> <i class="fa fa-times"></i></button>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($a->status == 'pending')
                                            <a onclick="approval({{$a->id}})" class="badge badge-pill bg-warning inv-badge text-white" style="cursor:pointer">pending</a>
                                            @elseif($a->status == 'approve')
                                            <a class="badge badge-pill bg-success inv-badge text-white" style="cursor: not-allowed">approve</a>
                                            @else
                                            <a class="badge badge-pill bg-danger inv-badge text-white" style="cursor: not-allowed">reject</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('blogAdmin.show',$a->id)}}" class="btn btn-info"><i class="fe fe-eye"></i></a>
                                        <a href="{{route('blogAdmin.edit',$a->id)}}" class="btn btn-success"><i class="fe fe-pencil"></i></a>
                                        <button class="btn btn-danger" onclick="hapus({{$a->id}})"><i class="fe fe-trash"></i></button>
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
</div>


<!-- Delete Model -->
<form action="/admin/blog/blog" method="post">
    @method('delete')
    @csrf
    <div class="modal fade" id="delete_modal" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-content p-2">
                        <h4 class="modal-title">Delete</h4>
                        <input type="hidden" name="id" id="id_delete">
                        <p class="mb-4">Are you sure want to delete?</p>
                        <button type="submit" class="btn btn-primary">Delete </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Delete Model -->

<!-- Active Model -->
<form action="/admin/blog/active" method="post">
    @method('patch')
    @csrf
    <div class="modal fade" id="active_modal" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-content p-2 text-center">
                        <h4 class="modal-title">Appoved</h4>
                        <input type="hidden" name="id" id="id_active">
                        <p class="mb-4">Are you sure want to activated this blog?</p>
                        <button type="submit" class="btn btn-primary">Approved </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Active Model -->

<!-- Active Model -->
<form action="/admin/blog/inactive" method="post">
    @method('patch')
    @csrf
    <div class="modal fade" id="inactive_modal" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-content p-2 text-center">
                        <h4 class="modal-title">Inactive</h4>
                        <input type="hidden" name="id" id="id_inactive">
                        <p class="mb-4">Are you sure want to inactive this blog?</p>
                        <button type="submit" class="btn btn-primary">Inactive </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Active Model -->

<div id="approval" class="modal fade bs-modal-lg" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog custom-modal-size-sm">
        <form>
            <div class="modal-content">
                <div class="modal-body">
                    <center>
                        <h4>Approval Blog</h4>
                    </center>
                    <hr>
                    <center>
                        <input type="hidden" id="id_approved">
                        <input type="hidden" id="id_mitra">
                        <div class="dash text-center"><h6 style="margin-bottom:0 !important"> <b>make sure your choice is correct because your choice cannot be changed again</b></h6></div>
                    </center>
                    <div class="row" style="margin-top: 25px;margin-left:10px;margin-right:10px">
                        <button class="btn btn-success btn-block btn-sm" id="btn-approve">Approve</button>
                        <button class="btn btn-danger btn-block btn-sm" id="btn-reject">Reject</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection

@section('js')

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>   

<script>

    function hapus(id){
        $('#id_delete').val(id);
        $('#delete_modal').modal('show');
    }

    function active(id){
        $('#id_active').val(id);
        $('#active_modal').modal('show');
    }

    function inactive(id){
        $('#id_inactive').val(id);
        $('#inactive_modal').modal('show');
    }

    function approval(id,id_mitra){
        $('#id_approved').val(id);
        $('#id_mitra').val(id_mitra);
        $('#approval').modal('show');
    }

    $('#btn-approve').click(function(e){
        e.preventDefault();
        $.ajax({
            url: "/admin/blog/approve/" + $('#id_approved').val(),
            type: "PUT",
            dataType: 'JSON',
            data: { 
                _token: "{{ csrf_token() }}", 
                _method: "PUT",
                'mitra_id': $('#id_mitra').val() 
            },
            success: function( data, textStatus, jQxhr ){
                if(data.code == 200){
                    alertify.success(data.response);
                    window.setTimeout(function(){location.reload()},2000);
                }
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
                console.warn(jqXhr.responseText);
            },
        });
    })

    $('#btn-reject').click(function(e){
        e.preventDefault();
        $.ajax({
            url: "/admin/blog/reject/" + $('#id_approved').val(),
            type: "PUT",
            dataType: 'JSON',
            data: { _token: "{{ csrf_token() }}", _method: "PUT" },
            success: function( data, textStatus, jQxhr ){
                if(data.code == 200){
                    alertify.success(data.response);
                    window.setTimeout(function(){location.reload()},2000);
                }
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
                console.warn(jqXhr.responseText);
            },
        });
    })
    
</script>

@endsection