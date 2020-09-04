@extends('admin.template.master')

@section('title','Mata Pelajaran')

@section('content')

<div class="col-md-12">

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

    <button id="button_tambah_mapel" class="btn btn-primary mb-3"><i class="fe fe-plus"></i> &nbsp; Tambah Mata Pelajaran</button>
    
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Mata Pelajaran</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="datatable table table-stripped">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Jenjang</th>
                            <th class="text-center">Kurikulum</th>
                            <th class="text-center">Mata Pelajaran</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mapel as $a)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$a->jenjang}}</td>
                            <td class="text-center">{{$a->kurikulum}}</td>
                            <td class="text-center">{{$a->mata_pelajaran}}</td>
                            <td class="text-center">
                                <button class="btn btn-success" onclick="edit({{$a->id}})"><i class="fe fe-pencil"></i></button>
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

<div class="modal" id="add_mapel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data Mata Pelajaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="/admin/pembelajaran/mapel" method="post">
                @csrf
            <div class="row">
                <div class="col-6 col-sm-6">
                    <div class="form-group">
                        <label>Data Jenjang</label>
                        <select class="form-control" name="jenjang" required>
                            @foreach ($jenjang as $item)
                                <option value="{{$item->id}}">{{$item->jenjang}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-6 col-sm-6">
                    <div class="form-group">
                        <label>Data Kurikulum</label>
                        <select class="form-control" name="kurikulum">
                            @foreach ($kurikulum as $item)
                                <option value="{{$item->id}}">{{$item->kurikulum}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-sm-12">
                    <div class="form-group">
                        <label>Data Mata Pelajaran</label>
                        <input type="text" class="form-control" name="mata_pelajaran" required>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
</div>

<div class="modal" id="edit_mapel" tabindex="-1" role="dialog">
    <form action="" method="post">
        @method('put');
        @csrf
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Edit Data Mata Pelajaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <div class="form-group">
                            <label>Data Jenjang</label>
                            <select class="form-control" name="jenjang" id="list_jenjang" required>
                                @foreach ($jenjang as $item)
                                    <option value="{{$item->id}}">{{$item->jenjang}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6">
                        <div class="form-group">
                            <label>Data Kurikulum</label>
                            <select class="form-control" name="kurikulum" id="list_kurikulum">
                                @foreach ($kurikulum as $item)
                                    <option value="{{$item->id}}">{{$item->kurikulum}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12">
                        <div class="form-group">
                            <label>Data Mata Pelajaran</label>
                            <input type="text" class="form-control" name="mata_pelajaran" id="mata_pelajaran" required>
                        </div>
                    </div>
                </div>
            </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
    </form>
</div>

<!-- Delete Model -->
<form action="/admin/pembelajaran/mapel" method="post">
    @method('delete');
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


@endsection

@section('js')

<script type="text/javascript">

    $('#button_tambah_mapel').click(function(){
        $('#add_mapel').modal('show');
    })

    function hapus(id){
        console.log(id);
        $('#id_delete').val(id);
        $('#delete_modal').modal('show');
    }

    function edit(id){
        $.ajax({
            url:'/admin/pembelajaran/mapel/edit/' + id,
            type:'get',
            dataType:'json',
            success:function(response){
                $('#edit_mapel').modal('show');
                $('#id_edit').val(id);
                $('#list_jenjang').val(response.jenjang);
                $('#list_kurikulum').val(response.kurikulum);
                $('#mata_pelajaran').val(response.mata_pelajaran);
            },
            error:function(){
                alert('error');
            }
        })
    }

</script>

@endsection