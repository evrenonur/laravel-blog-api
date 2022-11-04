@extends('backend.layout')

@section('head')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />


@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{$question->title}}</h4>
                    <a href="{{route('admin.questions.index')}}" class="btn btn-primary">Geri Dön</a>

                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row gy-4">
                            <!-- Striped Rows -->
                            <div class="col-md-12">
                                <table id="questionsTable" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Cevap</th>
                                        <th scope="col">Kullanıcı</th>
                                        <th scope="col">Kayıt Tarihi</th>
                                        <th scope="col">Durum</th>
                                        <th scope="col">İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($answers as $answer)
                                        <tr>
                                            <td>{{ $answer->id }}</td>
                                            <td>{{ $answer->body }}</td>
                                            <td>{{ $answer->user->name }}</td>
                                            <td>{{ $answer->created_at }}</td>
                                            <td>
                                                @if($answer->is_published)
                                                    <span class="badge bg-success">Aktif</span>
                                                @else
                                                    <span class="badge bg-danger">Pasif</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{route('admin.questions.answer.destroy',$answer->id)}}"
                                                      method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="mdi mdi-trash-can"></i></button>
                                                    <a  href="{{ route('admin.questions.active', $answer->id) }}" class="btn btn-success"><i class="mdi mdi-check"></i></a>
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

    @include('backend.questions.edit')

@endsection

@section('footer')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            new DataTable("#questionsTable")
        });
    </script>

@endsection
