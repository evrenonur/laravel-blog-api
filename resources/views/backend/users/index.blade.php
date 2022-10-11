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
                    <h4 class="card-title mb-0 flex-grow-1">Kullanıcılar</h4>

                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row gy-4">
                            <!-- Striped Rows -->
                            <div class="col-md-12">
                                <table id="usersTable" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">İsim</th>
                                        <th scope="col">Mail</th>
                                        <th scope="col">Durum</th>
                                        <th scope="col">Kayıt Tarihi</th>
                                        <th scope="col">İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($users as $user)
                                        <tr>
                                            <th scope="row">{{$user->id}}</th>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                @if($user->is_active == 1)
                                                    <span class="badge bg-success">Aktif</span>
                                                @else
                                                    <span class="badge bg-danger">Pasif</span>
                                                @endif
                                            </td>
                                            <td>{{$user->created_at}}</td>
                                            <td>
                                                <form action="{{route('admin.users.destroy',$user->id)}}"
                                                      method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="mdi mdi-trash-can"></i></button>
                                                    <button type="button" id="{{$user->id}}"
                                                            data-url="{{route('admin.users.edit',$user->id)}}"
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
@include('backend.users.edit')
@endsection

@section('footer')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            new DataTable("#usersTable")
        });
    </script>
@endsection
