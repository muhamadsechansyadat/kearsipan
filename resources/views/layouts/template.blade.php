<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('dist/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/modules/fontawesome/css/all.min.css')}}">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('dist/css/style.css')}}">
  <!-- <link rel="stylesheet" type="text/css" href="{{asset('dist/css/bootstrap.css')}}"> -->
  <link rel="stylesheet" type="text/css" href="{{asset('dist/css/dataTables.bootstrap4.min.css')}}">
  <script src="{{asset('dist/js/sweetalert.min.js')}}"></script>
  
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          @if(Auth::user()->level == '1')
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications <i class="far fa-bell"></i>
              </div>
              <div class="dropdown-list-content">
                @foreach($notif_surat_masuk as $field)
                <a href="{{ url('surat-masuk/show/'.$field->id) }}" class="dropdown-item dropdown-item-unread">
                  <img alt="image" src="{{asset('dist/img/avatar/avatar-1.png')}}" class="rounded-circle dropdown-item-img">
                  <div class="dropdown-item-desc">
                    <b><h5>{{ $field->pengirim }}</h5></b>
                    <p>{{ $field->perihal }}</p>
                    <div class="time">{{ $field->created_at->diffforHumans() }}</div>
                  </div>
                </a>
                @endforeach

                @foreach($notif_surat_keluar as $field)
                <a href="{{ url('surat-keluar/show/'.$field->id) }}" class="dropdown-item dropdown-item-unread">
                  <img alt="image" src="{{asset('dist/img/avatar/avatar-2.png')}}" class="rounded-circle dropdown-item-img">
                  <div class="dropdown-item-desc">
                    <b><h5>{{ $field->pengirim }}</h5></b>
                    <p>{{ $field->perihal }}</p>
                    <div class="time">{{ $field->created_at->diffforHumans() }}</div>
                  </div>
                </a>
                @endforeach
              </div>
              <div class="dropdown-footer text-center">
                <a href="/arsip/update/semua">Tandai Sebagai Baca <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          @endif
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{asset('dist/img/avatar/avatar-1.png')}}" width="30" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi,{{ Auth::user()->email }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="#" class="dropdown-item has-icon">
                <i class="far fa-user"></i> {!! substr( Auth::user()->name,0,15) !!}...
              </a>
              <a href="#" class="dropdown-item has-icon">
                <i class="fas fa-envelope"></i> {!! substr( Auth::user()->email,0,15) !!}...
              </a>
              <a href="#" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </div>
          </li>
        </ul>
      </nav>
      @if(Auth::user()->level == '1')
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ url('arsip/index') }}">Kearsipan</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="dashboard-index.html">s</a>
          </div>
          <ul class="sidebar-menu">
            <!-- <li class="menu-header">Dashboard</li> -->
            <li class="menu-header">Dashboard</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ url('arsip/index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
              </ul>
            </li>
            <!-- <li class="menu-header">Jenis Arsip</li> -->
            <li class="menu-header">Surat</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-paper-plane"></i> <span>Surat</span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ url('surat-masuk/index') }}" class="nav-link"><i class="fas fa-paper-plane"></i><span>Surat Masuk</span></a></li>
                <li><a href="{{ url('surat-keluar/index') }}" class="nav-link"><i class="fas fa-paper-plane"></i><span>Surat Keluar</span></a></li>
              </ul>
            </li>
            <li class="menu-header">Jenis</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-envelope"></i> <span>Jenis Surat</span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ url('jenis-arsip/index') }}" class="nav-link"><i class="fas fa-envelope"></i><span>Jenis Arsip</span></a></li>
                <!-- <li><a href="{{ url('suratkeluar') }}" class="nav-link"><i class="fas fa-paper-plane"></i><span>Surat Keluar</span></a></li> -->
              </ul>
            </li>
            <li class="menu-header">Laporan</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file"></i> <span>Laporan</span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ url('surat-masuk/laporan') }}" class="nav-link"><i class="fas fa-file"></i><span>Surat Masuk</span></a></li>
                <li><a href="{{ url('surat-keluar/laporan') }}" class="nav-link"><i class="fas fa-file"></i><span>Surat Keluar</span></a></li>
              </ul>
            </li>
          </ul>
        </aside>
      </div>
      @elseif(Auth::user()->level == '2')
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ url('arsip/index') }}">Kearsipan</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="dashboard-index.html">s</a>
          </div>
          <ul class="sidebar-menu">
            <!-- <li class="menu-header">Dashboard</li> -->
            <li class="menu-header">Dashboard</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ url('arsip/index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
              </ul>
            </li>
            <!-- <li class="menu-header">Jenis Arsip</li> -->
            <li class="menu-header">Surat</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-paper-plane"></i> <span>Surat</span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ url('surat-masuk/index') }}" class="nav-link"><i class="fas fa-paper-plane"></i><span>Surat Masuk</span></a></li>
                <li><a href="{{ url('surat-keluar/index') }}" class="nav-link"><i class="fas fa-paper-plane"></i><span>Surat Keluar</span></a></li>
              </ul>
            </li>
          </ul>
        </aside>
      </div>
      @endif

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>@yield('title')</h1>
          </div>
            
          <div class="section-body">
            @yield('content')
            @include('component.alert')
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2019 <div class="bullet"></div> Design By Kearsipan
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{asset('dist/modules/jquery.min.js')}}"></script>
  <script src="{{asset('dist/modules/popper.js')}}"></script>
  <script src="{{asset('dist/modules/tooltip.js')}}"></script>
  <script src="{{asset('dist/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('dist/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('dist/modules/moment.min.js')}}"></script>
  <script src="{{asset('dist/js/stisla.js')}}"></script>
  
  <!-- Template JS File -->
  <script src="{{asset('dist/js/scripts.js')}}"></script>
  <script src="{{asset('dist/js/custom.js')}}"></script>
  <!-- <script src="{{asset('dist/js/jquery-1.12.4.js')}}"></script> -->
  <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
    });
  </script>
  <script src="{{asset('dist/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('dist/js/dataTables.bootstrap4.min.js')}}"></script>
</body>
</html>


<!-- ====================================================================================== -->