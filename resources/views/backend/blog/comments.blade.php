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
                                    @foreach($comments->comments as $comment)
                                        <tr>
                                            <th scope="row">{{$comment->id}}</th>
                                            <td>{{$comment->user->name}}</td>
                                            <td>{{$comment->user->email}}</td>
                                            <td>{{$comment->body}}</td>
                                            <td>{{$comment->created_at}}</td>
                                            <td>
                                                @if($comment->status)
                                                    <button type="button" class="btn btn-success btn-sm status" id="{{$comment->id}}" >Aktif</button>
                                                @else
                                                    <button type="button" class="btn btn-danger btn-sm status" id="{{$comment->id}}">Pasif</button>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{route('admin.blog.comment.destroy',$comment->id)}}"
                                                      method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="mdi mdi-trash-can"></i></button>
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
    <script>
            $('.status').click(function () {
                const id = $(this).attr('id');
                $.ajax({
                    type: 'POST',
                    url: '{{route('admin.blog.comment.status')}}',
                    data: {id: id,'_token': '{{csrf_token()}}'},
                    success: function (data) {
                        if (data.status == 1) {
                            $('#'+id).removeClass('btn-danger');
                            $('#'+id).addClass('btn-success');
                            $('#'+id).text('Aktif');

                        } else {
                            $('#'+id).removeClass('btn-success');
                            $('#'+id).addClass('btn-danger');
                            $('#'+id).text('Pasif');
                        }
                    }
                });

            });

    </script>
@endsection
