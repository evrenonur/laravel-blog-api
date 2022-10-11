@extends('backend.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Yorumlar</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row gy-4">
                            <!-- Striped Rows -->
                            <div class="col-md-12">
                                <table class="table table-striped text-center">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Kullanıcı Adı</th>
                                        <th scope="col">Kullanıcı Mail</th>
                                        <th scope="col">Yorum</th>
                                        <th scope="col">Yorum Tarihi</th>
                                        <th scope="col">Durum</th>
                                        <th scope="col">İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $comment)
                                        <tr>
                                            <th scope="row">{{$comment->id}}</th>
                                            <td>{{$comment->user->name}}</td>
                                            <td>{{$comment->user->email}}</td>
                                            <td>{{$comment->body}}</td>
                                            <td>{{$comment->created_at}}</td>
                                            <td>
                                            <td>
                                                @if($comment->status)
                                                    <span class="badge bg-success">Aktif</span>
                                                @else
                                                    <span class="badge bg-danger">Pasif</span>
                                                @endif
                                            </td>
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
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
