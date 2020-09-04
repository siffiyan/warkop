@extends('admin.template.master')

@section('title', 'Edit Blog')
    
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
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">

                    <!-- Add details -->
                    <div class="row">
                        <div class="col-12 blog-details">
                            <form action="{{route('blogAdmin.update',$blog->id)}}" method="post" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <input type="hidden" name="status" value="approve">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Judul Blog</label>
                                            <input class="form-control" type="text" name="judul" value="{{$blog->judul}}" required>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Gambar Blog</label>
                                            <div>
                                                <input class="form-control" type="file" name="image">
                                                <small class="form-text text-muted">Max. file size: 50 MB. Allowed images: jpg, gif, png. Maximum 10 images only.</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select id="kategori-list" class="form-control" tabindex="-1" aria-hidden="true" name="kategori" required>
                                                <option value="Web Design">Web Design</option>
                                                <option value="Web Development">Web Development</option>
                                                <option value="App Development">App Development</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Blog</label>
                                    {{-- <textarea cols="30" rows="6" class="form-control"></textarea> --}}
                                    <textarea id="content" name="content" required>{!! $blog->content !!}</textarea>
                                </div>
                                <div class="m-t-20 text-center">
                                    <button type="submit" class="btn btn-primary btn-sm pull-right">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /Add details -->

                </div>
            </div>
        </div>			
    </div>
</div>


@endsection

@section('js')

<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
    $(document).ready(function(){
        $('#kategori-list').val('{{$blog->kategori}}').prop('selected', true);
        //CKEDITOR.instances['content'].setData('{!! $blog->content !!}');
    });
</script>
@endsection