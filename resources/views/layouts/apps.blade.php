<!DOCTYPE html>
<html lang="en">

 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Sistem Informasi  </title>

    <!-- Bootstrap -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('vendors/animate.css/animate.min.css') }}" rel="stylesheet">
  
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('build/css/custom.min.css') }}" rel="stylesheet">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="/" class="site_title"><span>Sistem Informasi </span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset('images/images.png')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span> <br>                
                  @if (Auth::check())
                  {{ Auth::user()->nama_user }}
                  @endif
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="/"><i class="fa fa-home"></i> Dasboard </a>
                  </li>
                  @if (Auth::check())
                    @if (Auth::user()->roles()->first()->name == "Admin")
                  <li><a><i class="fa fa-edit"></i> Menu <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{route('users.index')}}"> Users </a></li>
                    <li><a href="{{route('mahasiswa.index')}}"> Data Mahasiswa </a></li>
                    <li><a href="{{route('roles.index')}}"> Roles </a></li>
                    <li><a href="{{route('permission.index')}}"> Permission</a></li>
                    <li><a href="{{route('permissionrole.index')}}"> Permission Role</a></li>
                    <li><a href="{{route('roleuser.index')}}"> Role User</a></li>
                  </ul>
                  </li>
                  <li><a href="{{route('perusahaan.index')}}"><i class="fa fa-institution"></i> Perusahan </a>
                  </li>
                  <li><a href="{{route('daftarpkl.index')}}"><i class="fa fa-briefcase"></i> PKL</a>
                  </li>
                  <li><a href="{{route('prodi.index')}}"><i class="fa fa-graduation-cap"></i> Prodi</a>
                  </li>
                  <li><a href="{{route('bidang.index')}}"><i class="fa fa-suitcase"></i> Bidang</a>
                  </li>
                  <li><a href="{{route('bidangpkl.index')}}"><i class="fa fa-suitcase"></i> Bidang PKL</a>
                  </li>
                  <li><a href="{{route('dosen.index')}}"><i class="fa fa-suitcase"></i> Dosen</a>
                  </li>
                  <li><a href="{{route('mahasiswa.index')}}"><i class="fa fa-suitcase"></i> Mahasiswa</a>
                  </li>
                  </li>
                  <li><a href="{{route('pembimbing.index')}}"><i class="fa fa-suitcase"></i>Pembimbing</a>
                  <li><a><i class="fa fa-suitcase"></i>Report<span class="fa fa-chevron-down"></span></a>
                   <ul class="nav child_menu">
                    <li><a href="{{route('pembimbing.select')}}"> Data Pembimbing </a></li>
                    <li><a href="{{route('pembimbing.select')}}"> Data PKL </a></li>
                   </ul>
                  </li>
                  @endif
                  @if (Auth::user()->roles()->first()->name == "Mahasiswa")
                    <li>
                  @if (Auth::user()->mahasiswa()->count() === 0 )
                    <a href="{{route('mahasiswa.create')}}"><i class="fa fa-briefcase"></i>Daftar</a>
                  @endif

                  @if (Auth::user()->mahasiswa()->count() === 1 )
                    <a href="{{route('mahasiswa.show', [Auth::user()->id] )}}"><i class="fa fa-briefcase"></i>Profil</a>
                  @endif

                  <li><a href="{{route('perusahaan.index')}}"><i class="fa fa-institution"></i>Perusahaan </a>
                  </li>
                  <li>
                  
                  @if (Auth::user()->daftarpkl()->count() === 0 )
                    <a href="{{route('daftarpkl.create')}}"><i class="fa fa-briefcase"></i>Daftar</a>
                  @endif

                  @if (Auth::user()->daftarpkl()->count() === 1 )
                    <a href="{{route('daftarpkl.edit', [Auth::user()->id] )}}"><i class="fa fa-briefcase"></i>Daftar</a>
                  @endif

                  </li>
                  @endif
                  @if (Auth::user()->roles()->first()->name == "Kaprodi")
                    <li><a href="{{route('users.show', Auth::id())}}"><i class="fa fa-female"></i> Profil </a>
                  </li>
                   <li><a href="{{route('daftarpkl.index')}}"><i class="fa fa-briefcase"></i>Daftar Mahasiswa PKL</a>
                  </li>                 
                  <li><a href="{{route('perusahaan.index')}}"><i class="fa fa-institution"></i>Perusahan </a>
                  </li>
                  <li><a href="{{route('pembimbing.index')}}"><i class="fa fa-suitcase"></i>Pembimbing</a>
                  </li>
                  <li><a href="{{route('pembimbing.select')}}"><i class="fa fa-suitcase"></i>Select</a>
                  </li>
                  @endif
                  @endif
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> 
                  @if (Auth::check())                   
                  {{ Auth::user()->nama_user }}
                  @endif
                    <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                    @else
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Out</a></li>
                    @endif
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          @if (Session::has('message'))
              <div class="alert alert-info">
                  <p>{{ Session::get('message') }}</p>
              </div>
          @endif

          @yield('content')

        </div>              
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            @Copyright by <a href="https://polinpdg.ac.id">Politeknik Negeri Padang</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- compose -->
    <div class="compose col-md-6 col-xs-12">
      <div class="compose-header">
        New Message
        <button type="button" class="close compose-close">
          <span>×</span>
        </button>
      </div>

      <div class="compose-body">
        <div id="alerts"></div>

        <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
          <div class="btn-group">
            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
            <ul class="dropdown-menu">
            </ul>
          </div>

          <div class="btn-group">
            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i><b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li>
                <a data-edit="fontSize 5">
                  <p style="font-size:17px">Huge</p>
                </a>
              </li>
              <li>
                <a data-edit="fontSize 3">
                  <p style="font-size:14px">Normal</p>
                </a>
              </li>
              <li>
                <a data-edit="fontSize 1">
                  <p style="font-size:11px">Small</p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- /compose -->

<!-- jQuery -->
    <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstra{{ asset('rogressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('vendors/DateJS/build/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('build/js/custom.min.js') }}  "></script>

    <!-- Confirm Message -->
    <script src="{{ asset('build/js/script.min.js') }}  "></script>

  </body>
</html>