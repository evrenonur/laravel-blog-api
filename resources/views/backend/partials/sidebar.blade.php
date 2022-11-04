<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->

        <!-- Light Logo-->
        <a href="{{route('admin.home')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset("assets")}}/images/logo-sm.png" alt="" height="22">
                    </span>
            <span class="logo-lg">
                        <img src="{{asset("assets")}}/images/logo-light.png" alt="" height="17">
                    </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('admin.home')}}" >
                        <i class="mdi mdi-speedometer"></i><span>Anasayfa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#news" data-bs-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="news">
                        <i class="mdi mdi-newspaper"></i><span>Blog</span>
                    </a>
                    <div class="collapse menu-dropdown" id="news">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('admin.categories.index')}}" class="nav-link">Kategoriler</a>
                            </li>

                        </ul>
                    </div>
                    <div class="collapse menu-dropdown" id="news">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('admin.blog.index')}}" class="nav-link">Yazılar</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('admin.questions.index')}}" >
                        <i class="mdi mdi-message"></i><span>Sorular</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('admin.users.index')}}" >
                        <i class="mdi mdi-account"></i><span>Kullanıcılar</span>
                    </a>
                </li>



            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
