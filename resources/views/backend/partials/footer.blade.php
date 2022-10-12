<!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- JAVASCRIPT -->

<script src="{{asset("assets")}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset("assets")}}/libs/simplebar/simplebar.min.js"></script>
<script src="{{asset("assets")}}/libs/node-waves/waves.min.js"></script>
<script src="{{asset("assets")}}/libs/feather-icons/feather.min.js"></script>
<script src="{{asset("assets")}}/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="{{asset("assets")}}/js/plugins.js"></script>

<!-- apexcharts -->
<script src="{{asset("assets")}}/libs/apexcharts/apexcharts.min.js"></script>

<!-- Vector map-->
<script src="{{asset("assets")}}/libs/jsvectormap/js/jsvectormap.min.js"></script>
<script src="{{asset("assets")}}/libs/jsvectormap/maps/world-merc.js"></script>

<!--Swiper slider js-->
<script src="{{asset("assets")}}/libs/swiper/swiper-bundle.min.js"></script>

<!-- Dashboard init -->
<script src="{{asset("assets")}}/js/pages/dashboard-ecommerce.init.js"></script>

<!-- App js -->
<script src="{{asset("assets")}}/js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    iziToast.settings({
        timeout: 2000,
        resetOnHover: true,
        transitionIn: 'flipInX',
        transitionOut: 'flipOutX',
        position: 'topRight',
    });
    @if(session()->has('success'))
    iziToast.success({
        title: 'Başarılı',
        message: '{{session('success')}}',
    });
    @endif
    @if(session()->has('error'))
    iziToast.error({
        title: 'Hata',
        message: '{{session('error')}}',
    });
@endif
</script>

<div class="modal fade" id="profil" tabindex="-1" aria-labelledby="profil" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profil">Profil Düzenle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.users.update',auth()->user()->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-xxl-6">
                            <div>
                                <label class="form-label">Kullanıcı Adı</label>
                                <input type="text" name="name" id="name" value="{{auth()->user()->name}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-xxl-6">
                            <div>
                                <label class="form-label">Kullanıcı Mail</label>
                                <input type="text" name="email" id="email" value="{{auth()->user()->email}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label class="form-label">Kullanıcı Şifre</label>
                                <input type="text" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">İptal</button>
                                <button type="submit" class="btn btn-primary">Kaydet</button>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('.profile').click(function () {
        $('#profil').modal('show');
    });
</script>



@yield('footer')
</body>

</html>
