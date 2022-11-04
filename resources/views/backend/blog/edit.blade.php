@extends('backend.layout')
@section('content')
    <div class="row">
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Yazı Güncelle</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <form action="{{route('admin.blog.update',$post->id)}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Başlık</label>
                            <input type="text" name="title" class="form-control" value="{{$post->title}}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                            @if($category->id == $post->category_id) selected @endif>{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">İçerik</label>
                            <textarea name="contents" id="content">{{$post->content}}</textarea>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Resim</label>
                            <input type="file" name="image" class="form-control">
                            <input type="hidden" name="tmp_image" value="{{$post->image}}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Yorum Durumu</label>
                            <select name="comment_status" class="form-control ">
                                <option value="1" @if($post->comment_status == 1) selected @endif>Açık</option>
                                <option value="0" @if($post->comment_status == 0) selected @endif>Kapalı</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Yayın Durumu</label>
                            <select name="is_published" class="form-control">
                                <option value="1" @if($post->is_published == 1) selected @endif>Açık</option>
                                <option value="0" @if($post->is_published == 0) selected @endif>Kapalı</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Slider Durumu</label>
                            <select name="is_slider" class="form-control">
                                <option value="1" @if($post->is_slider == 1) selected @endif>Açık</option>
                                <option value="0" @if($post->is_slider == 0) selected @endif>Kapalı</option>
                            </select>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Güncelle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    @section('footer')
        <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
        <script>
            var options = {
                filebrowserUploadUrl: "{{route('admin.ckeditor.store', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form'
            };
        </script>
        <script>
            CKEDITOR.replace('content', options);
        </script>
    @endsection
@endsection

