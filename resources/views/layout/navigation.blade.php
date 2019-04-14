<!-- Sidenav -->
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="#">
            <img src="{{ asset('img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">

            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="{{ asset('img/theme/team-1-800x800.jpg') }}">
              </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Mirëserdhët!</h6>
                    </div>
                    <a href="../../../../argon-dashboard-master/examples/profile.html" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>Llogaria</span>
                    </a>
                    <a href="../../../../argon-dashboard-master/examples/profile.html" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>Cilësimet</span>
                    </a>
                    <a href="../../../../argon-dashboard-master/examples/profile.html" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>Aktiviteti</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#!" class="dropdown-item">
                        <i class="ni ni-user-run"></i>
                        <span>Dilni</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="#">
                            <img src="{{ asset('img/brand/blue.png') }}">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-tv-2 text-primary"></i> Kryefaqe
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/tables">
                        <i class="fas fa-layer-group text-blue"></i> Tavolina
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/magazina">
                        <i class="fas fa-archive text-orange"></i> Magazina
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/category">
                        <i class="fas fa-bars text-orange"></i> Kategori
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/raports">
                        <i class="fas fa-chart-line text-yellow"></i> Raportet
                    </a>
                </li>

                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="../../../../argon-dashboard-master/examples/login.html">--}}
                        {{--<i class="ni ni-key-25 text-info"></i> Login--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="../../../../argon-dashboard-master/examples/register.html">--}}
                        {{--<i class="ni ni-circle-08 text-pink"></i> Register--}}
                    {{--</a>--}}
                {{--</li>--}}
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Support</h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="help">
                        <i class="far fa-life-ring text-red"></i> Ndihmë
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
