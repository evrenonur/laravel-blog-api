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

@yield('footer')
</body>

</html>
