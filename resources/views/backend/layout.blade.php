
@include('backend.partials.head')


@include('backend.partials.navbar')
@include('backend.partials.sidebar')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
               @yield('content')
            </div>
            <!-- container-fluid -->
        </div>



    </div>
 @include("backend.partials.footer")
