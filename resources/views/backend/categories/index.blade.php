@extends('backend.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Kategoriler</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">Yeni
                                Ekle
                            </button>
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
                                        <th scope="col">Id</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Resim</th>
                                        <th scope="col">Durum</th>
                                        <th scope="col">İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($categories as $category)
                                        <tr>
                                            <th scope="row">{{$category->id}}</th>
                                            <td>{{$category->category_name}}</td>
                                            <td><img src="{{ asset('categories/'.$category->category_image) }}"
                                                     width="56" height="55" class="img-thumbnail rounded"></td>
                                            <td>
                                                @if($category->status)
                                                    <span class="badge bg-success">Aktif</span>
                                                    @else
                                                    <span class="badge bg-danger">Pasif</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{route('admin.categories.destroy',$category->id)}}"
                                                      method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="mdi mdi-trash-can"></i></button>
                                                    <button type="button" id="{{$category->id}}"
                                                            data-url="{{route('admin.categories.edit',$category->id)}}"
                                                            class="btn btn-info editBtn"><i class="mdi mdi-pencil"></i></button>
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


    @include('backend.categories.create')
    @include('backend.categories.edit')
@endsection
