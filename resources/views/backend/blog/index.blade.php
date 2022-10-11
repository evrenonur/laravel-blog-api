@extends('backend.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Blog Yazıları</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <a href="{{route('admin.blog.create')}}" class="btn btn-success" >Yeni
                                Ekle
                            </a>
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row gy-4">
                            <!-- Striped Rows -->
                            <div class="col-md-12">
                                <table class="table table-striped text-center">
                                    <thead>
                                    <tr>
                                        <th scope="col">Resim</th>
                                        <th scope="col">Başlık</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Durum</th>
                                        <th scope="col">Yorum</th>
                                        <th scope="col">Görüntülenme Sayısı</th>
                                        <th scope="col">İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($blogs as $blog)
                                        <tr>
                                            <td>
                                                <img src="{{asset("uploads/".$blog->image)}}" width="100" alt="">
                                            </td>
                                            <td>{{$blog->title}}</td>
                                            <td>{{$blog->category->category_name}}</td>
                                            <td>
                                                @if($blog->is_published)
                                                    <span class="badge bg-success">Yayında</span>
                                                @else
                                                    <span class="badge bg-danger">Yayında Değil</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($blog->comment_status)
                                                    <span class="badge bg-success">Açık</span>
                                                @else
                                                    <span class="badge bg-danger">Kapalı</span>
                                                @endif
                                            </td>
                                            <td>{{$blog->views_count}}</td>
                                            <td>
                                                <form action="{{route('admin.blog.destroy',$blog->id)}}"
                                                      method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="mdi mdi-trash-can"></i></button>
                                                    <a href="{{route('admin.blog.edit',$blog->id)}}" class="btn btn-info "><i class="mdi mdi-pencil"></i></a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <!--end row-->
                    </div>

                </div>
            </div>
        </div>
        <!--end col-->
    </div>

@endsection
