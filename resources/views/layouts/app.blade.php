<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
        <meta name="description" content="Start your development with a Dashboard for Bootstrap 4." />
        <meta name="author" content="Creative Tim" />
        <title>{{ env('APP_NAME') }}</title>
        <link rel="canonical" href="https://www.creative-tim.com/product/impact-design-system" />
        <meta
            name="keywords"
            content="impact design system, design system, login, form, table, tables, calendar, card, cards, navbar, modal, icons, icons, map, chat, carousel, menu, datepicker, gallery, slider, date, sidebar, social, dropdown, search, tab, nav, footer, date picker, forms, tabs, time, button, select, input, timeline, cart, car, fullcalendar, about us, invoice, account, chat, log in, blog, profile, portfolio, landing page, ecommerce, shop, landing, register, app, contact, one page, sign up, signup, store, bootstrap 4, bootstrap4, dashboard, bootstrap 4 dashboard, bootstrap 4 design, bootstrap 4 system, bootstrap 4, bootstrap 4 uit kit, bootstrap 4 kit, impact, impact ui kit, creative tim, html kit, html css template, web template, bootstrap, bootstrap 4, css3 template, frontend, responsive bootstrap template, bootstrap ui kit, responsive ui kit, impact dashboard"
        />
        <meta name="description" content="Kick-Start Your Development With An Awesome Design System carefully designed for your online business showcase. It comes as a complete solution, with front pages and dashboard pages included." />
        <meta itemprop="name" content="Impact Design System by Creative Tim" />
        <meta
            itemprop="description"
            content="Kick-Start Your Development With An Awesome Design System carefully designed for your online business showcase. It comes as a complete solution, with front pages and dashboard pages included."
        />
        <meta itemprop="image" content="https://s3.amazonaws.com/creativetim_bucket/products/296/original/opt_impact_thumbnail.jpg')}}" />
        <meta name="twitter:card" content="product" />
        <meta name="twitter:site" content="@creativetim" />
        <meta name="twitter:title" content="Impact Design System by Creative Tim" />
        <meta
            name="twitter:description"
            content="Kick-Start Your Development With An Awesome Design System carefully designed for your online business showcase. It comes as a complete solution, with front pages and dashboard pages included."
        />
        <meta name="twitter:creator" content="@creativetim" />
        <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/296/original/opt_impact_thumbnail.jpg')}}" />
        <meta property="fb:app_id" content="655968634437471" />
        <meta property="og:title" content="Impact Design System by Creative Tim" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="https://demos.creative-tim.com/impact-design-system/" />
        <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/296/original/opt_impact_thumbnail.jpg')}}" />
        <meta
            property="og:description"
            content="Kick-Start Your Development With An Awesome Design System carefully designed for your online business showcase. It comes as a complete solution, with front pages and dashboard pages included."
        />
        <meta property="og:site_name" content="Creative Tim" />
        <link rel="icon" href="{{asset('assets/img/brand/favicon.png')}}" type="image/png" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" />
        <link rel="stylesheet" href="{{asset('assets/css/nucleo.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('assets/all.min.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('assets/assets/vendor/fullcalendar/dist/fullcalendar.min.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/dashboard.css')}}" type="text/css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"  />
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css"  />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>




<body>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"></script> --}}
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical fixed-left  navbar-expand-xs navbar-success bg-dark-green" id="sidenav-main" style="background-color: #0b5837">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  d-flex  align-items-center">
        <a class="" href="{{ url('/scolarships/national') }}">
            <img src="{{asset('assets/img/bourse1.png')}}" style="height:70px; width:auto" class="ml-4" alt="...">
        </a>
        <div class=" ml-auto ">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ request()->segment(1) == 'scolarships' && request()->segment(2) == 'national'?'active':'' }}" href="{{ url('/scolarships/national') }}">
                <i class="fa fa-flag text-white"></i>
                <span class="nav-link-text text-white">Bourses National</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->segment(1) == 'scolarships' && request()->segment(2) == 'cooperation'?'active':'' }}" href="{{ url('/scolarships/cooperation') }}">
                <i class="fa fa-handshake text-white"></i>
                <span class="nav-link-text text-white">Bourses De cooperation</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->segment(1) == 'applications'?'active':'' }}" href="{{ url('/applications') }}">
                <i class="fa fa-clock text-white"></i>
                <span class="nav-link-text text-white">Demandes en cours</span>
              </a>
            </li>
            @can('manage_users')
                <li class="nav-item">
                <a class="nav-link {{ request()->segment(1) == 'users' && request()->segment(2) == 'admin'?'active':'' }}" href="{{ url('/users/admin') }}">
                    <i class="fa fa-user-secret text-white"></i>
                    <span class="nav-link-text text-white">Admins</span>
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link {{ request()->segment(1) == 'users' && request()->segment(2) == 'user'?'active':'' }}" href="{{ url('/users/user') }}">
                    <i class="fa fa-user text-white"></i>
                    <span class="nav-link-text text-white">Utilisateurs</span>
                </a>
                </li>

                <li class="nav-item">
                <a class="nav-link {{ request()->segment(1) == 'settings'?'active':'' }}" href="{{ url('/settings') }}">
                    <i class="fa fa-cog text-white"></i>
                    <span class="nav-link-text text-white">Parametres</span>
                </a>
                </li>
            @endcan
            <li class="nav-item">
                <a class="nav-link {{ request()->segment(1) == 'profile'?'active':'' }}" href="{{ url('/profile') }}">
                    <i class="fa fa-user text-white"></i>
                    <span class="nav-link-text text-white">Profile</span>
                </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>


          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{asset('assets/img/user/img-1.jpg')}}">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm text-dark  font-weight-bold">{{ auth()->user()->first_name == null?auth()->user()->email:auth()->user()->first_name.' '.auth()->user()->last_name }}</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-divider"></div>
                <a href="#!" class="dropdown-item" id="logout">
                  <i class="ni ni-user-run"></i>
                  <span>Se Deconnecter</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    @if (session('error') )
    <div class="container alert alert-danger">{{session('error')}}</div>
    @endif
    @if($errors->any())
    <div class="container row alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session('status'))
        <div class="container alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @yield('content')




      <!-- Footer -->
      <footer class="footer pt-0 px-5">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
                Concu par <a href="https://www.soulsaducam.com" class="font-weight-bold ml-1" target="_blank">Soulsaducam</a> &copy; {{ date('Y') }}
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="tel:+237699722414" class="nav-link" target="_blank">+237699722414</a>
              </li>
              <li class="nav-item">
                <a href="tel:+237677454491" class="nav-link" target="_blank">+237677454491</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/vendor/js-cookie/js.cookie.js')}}"></script>
<script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
<script src="{{ asset('assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
<script src="{{ asset('assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
<script src="{{ asset('assets/js/dashboard5438.js')}}?v=1.2.0"></script>
<script src="{{ asset('assets/js/demo.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
  <script>
    document.getElementById('logout').addEventListener('click', () => {
        url = "{{url('/')}}/logout"
        console.log('{{csrf_token()}}')
        fetch(url,{
        method:'POST',
        credentials:'same-origin',
        headers:{
            "Content-Type":"application/json",
            "Accept":"application/json",
            "X-CSRF-TOKEN":"{{csrf_token()}}"
        },
        body: JSON.stringify({
            _token: "{{csrf_token()}}",
        }),

        }).then(res => {
        if(res.status == 200){
            location.reload();
        }else{
            alert('Server Error Occurred')
        }
        })
    })
  </script>

<script>
    let errormsg = "{{ session('error')!= null?session('error'):'' }}";
    let successmsg = "{{ session('status')!= null?session('status'):'' }}";
    let form_errors = "@php foreach($errors->all() as $error) {echo $error.',';} @endphp"
    if (errormsg != '') {
        toastr.error(errormsg)
    }
    if (successmsg != '') {
        toastr.success(successmsg)
    }
    if (form_errors != '') {
        toastr.error(successmsg)
    }
</script>
<script>
    var datata;
        $(document).ready(function () {
            datatb= $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
            console.log(datatb)
            // datatb.buttons().container().appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );
        });
</script>
  {{-- @yield('scripts') --}}
</body>

</html>
