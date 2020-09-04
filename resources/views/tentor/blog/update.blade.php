@extends('tentor.template.master')

@section('title', 'Add Blog')
    
@section('content')

<div class="col-md-12">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">

                    <!-- Add details -->
                    <div class="row">
                        <div class="col-12 blog-details">
                            <form action="{{route('blog.update',$blog->id)}}" method="post" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <input type="hidden" name="status" value="approve">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Judul Blog</label>
                                            <input class="form-control" type="text" name="judul" value="{{$blog->judul}}">
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
                                            <select class="select select2-hidden-accessible form-control" tabindex="-1" aria-hidden="true" name="kategori" id="kategori">
                                                <option>Web Design</option>
                                                <option>Web Development</option>
                                                <option>App Development</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Blog</label>
                                    {{-- <textarea cols="30" rows="6" class="form-control"></textarea> --}}
                                    <textarea id="content" name="content"></textarea>
                                </div>
                                <div class="m-t-20 text-right">
                                    <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
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
    CKEDITOR.replace( 'content');
    $(document).ready(function(){
        $('#kategori').val('{{$blog->kategori}}');
        CKEDITOR.instances['content'].setData('{!! $blog->content !!}');
    });
</script>
@endsection