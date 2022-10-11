@extends('backend.layout')
@section('content')
    <div class="row">
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Yeni Yazı Ekle</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <form action="{{route('admin.blog.store')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Başlık</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">İçerik</label>
                            <textarea name="contents" id="content"></textarea>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Resim</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Yorum Durumu</label>
                            <select name="comment_status" class="form-control ">
                                <option value="1">Açık</option>
                                <option value="0">Kapalı</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Yayın Durumu</label>
                            <select name="is_published" class="form-control">
                                <option value="1">Açık</option>
                                <option value="0">Kapalı</option>
                            </select>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Kaydet</button>
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
            CKEDITOR.replace('content',options);
        </script>
    @endsection
@endsection

