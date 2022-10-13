<!doctype html>
<html lang="tr" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
      data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8"/>
    <title>Yönetim Paneli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset("assets")}}/images/favicon.ico">

    <!-- Layout config Js -->
    <script src="{{asset("assets")}}/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="{{asset("assets")}}/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{asset("assets")}}/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{asset("assets")}}/css/app.min.css" rel="stylesheet" type="text/css"/>
    <!-- custom Css-->
    <link href="{{asset("assets")}}/css/custom.min.css" rel="stylesheet" type="text/css"/>


</head>

<body>

<div class="auth-page-wrapper pt-5">
    <!-- auth page bg -->
    <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
        <div class="bg-overlay"></div>


    </div>

    <!-- auth page content -->
    <div class="auth-page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mt-sm-5 mb-4 text-white-50">
                        <div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">

                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Yönetim Paneli</h5>
                                <p class="text-muted">Lütfen giriş yapınız</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="username" class="form-label">Kullanıcı Adı</label>
                                        <input type="text" class="form-control" name="email" id="username">
                                    </div>

                                    <div class="mb-3">

                                        <label class="form-label" for="password-input">Şifre</label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input type="password" name="password"
                                                   class="form-control pe-5 password-input" id="password-input">
                                            <button
                                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted shadow-none password-addon"
                                                type="button" id="password-addon"><i
                                                    class="ri-eye-fill align-middle"></i></button>
                                        </div>
                                    </div>


                                    <div class="mt-4">
                                        <button class="btn btn-success w-100" type="submit">Giriş Yap</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->


                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->


    <!-- end Footer -->
</div>
<!-- end auth-page-wrapper -->

<!-- JAVASCRIPT -->
<script src="{{asset("assets")}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset("assets")}}/libs/simplebar/simplebar.min.js"></script>
<script src="{{asset("assets")}}/libs/node-waves/waves.min.js"></script>
<script src="{{asset("assets")}}/libs/feather-icons/feather.min.js"></script>
<script src="{{asset("assets")}}/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="{{asset("assets")}}/js/plugins.js"></script>

<!-- particles js -->
<script src="{{asset("assets")}}/libs/particles.js/particles.js"></script>
<!-- particles app js -->
<script src="{{asset("assets")}}/js/pages/particles.app.js"></script>
<!-- password-addon init -->
<script src="{{asset("assets")}}/js/pages/password-addon.init.js"></script>
</body>

</html>






