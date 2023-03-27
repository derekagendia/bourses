<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <div class="sidenav-header d-flex align-items-center">
            <img src="{{ asset('assets/img/brand/dark.svg') }}" class="navbar-brand-img ml-3" alt="">
            <div class="ml-auto">
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner"><i class="sidenav-toggler-line"></i> <i class="sidenav-toggler-line"></i> <i class="sidenav-toggler-line"></i></div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a href="/my-couriers" class="nav-link {{ request()->segment(1) == 'my-couriers'?'active':'' }}"><i class="ni ni-email-83 text-info"></i> <span class="nav-link-text">Mes Couriers</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="/my-audiences" class="nav-link {{ request()->segment(1) == 'my-audiences'?'active':'' }}"><i class="ni ni-badge text-danger"></i> <span class="nav-link-text">Mes Audiences</span></a>
                    </li>
                    @can('manage_couriers')
                    <li class="nav-item">
                        <a href="/couriers" class="nav-link {{ request()->segment(1) == 'couriers'?'active':'' }}"><i class="ni ni-email-83 text-primary"></i> <span class="nav-link-text">Couriers</span></a>
                    </li>
                    @endcan
                    @can('manage_audiences')
                    <li class="nav-item">
                        <a href="/audiences" class="nav-link {{ request()->segment(1) == 'audiences'?'active':'' }}"><i class="ni ni-badge text-warning"></i><span class="nav-link-text">Audiences</span></a>
                    </li>
                    @endcan
                    @can('manage_users')
                    <hr class="my-3" />
                    <li class="nav-item">
                        <a href="/settings" class="nav-link {{ request()->segment(1) == 'settings'?'active':'' }}"><i class="ni ni-settings text-success"></i> <span class="nav-link-text">Configurations</span></a>
                    </li>
                    @endcan

                </ul>
            </div>
        </div>
    </div>
</nav>
