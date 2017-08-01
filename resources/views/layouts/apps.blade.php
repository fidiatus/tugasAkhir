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
    
    <!-- Datatables -->
    <link href="{{ asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">

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
                  <li><a><i class="fa fa-edit"></i> Kelola User <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{route('users.index')}}"> Users </a></li>
                    <li><a href="{{route('roles.index')}}"> Roles </a></li>
                    <li><a href="{{route('permission.index')}}"> Permission</a></li>
                    <li><a href="{{route('permissionrole.index')}}"> Permission Role</a></li>
                    <li><a href="{{route('roleuser.index')}}"> Role User</a></li>
                  </ul>
                  </li>
                  
                  <li><a><i class="fa fa-briefcase"></i> Kelola PKL<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('daftarpkl.selectpkl')}}"> Seleksi Data PKL </a></li>
                      <li><a href="{{route('daftarpkl.index')}}"> Data PKL </a></li>
                      <li><a href="{{route('perusahaan.index')}}"> Instansi </a></li>
                      <li><a href="{{route('bidangpkl.index')}}"> Bidang PKL</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-briefcase"></i> Kelola Mahasiswa<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('mhs.selectmhs')}}"> Seleksi Data Mahasiswa </a></li>
                      <li><a href="{{route('mahasiswa.index')}}"> Data Mahasiswa </a></li>
                      <li><a href="{{route('prodi.index')}}"> Prodi</a></li>
                    </ul>
                  </li>

                  </li>
                  <li><a><i class="fa fa-suitcase"></i> Kelola Dosen <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('dosen.index')}}">Data Dosen</a></li>
                      <li><a href="{{route('pembimbing.index')}}"> List Pembimbing </a></li>
                      <li><a href="{{route('bidang.index')}}"> Bidang</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-suitcase"></i>Report<span class="fa fa-chevron-down"></span></a>
                   <ul class="nav child_menu">
                     <li><a href="{{route('pembimbing.select')}}"> Report Data Pembimbing </a></li>
                    <li><a href="{{route('pembimbing.selectdosen')}}">Report Jumlah bimbingan </a></li>
                    <li><a href="{{route('pembimbing.selectds')}}">Report Dosen Bimbingan </a></li>
                     <li><a href="{{route('daftarpkl.select')}}"> Report Data PKL </a></li>
                    <li><a href="{{route('daftarpkl.selectperusahaan')}}">Report jumlah data perPerusahaan </a></li>
                    <li><a href="{{route('daftarpkl.selectpr')}}">Report data perPerusahaan </a></li>
                   </ul>
                  </li>
                  @endif
                  @if (Auth::user()->roles()->first()->name == "Mahasiswa")
                      <li>
                      <a href="{{route('mahasiswa.show', Auth::user()->id )}}"><i class="fa fa-briefcase"></i>Profil</a></li>

                    <li><a href="{{route('perusahaan.index')}}"><i class="fa fa-institution"></i>Instansi</a>
                    </li>
                    <li>
                    @if(Auth::user()->mahasiswa()->value('prodi_id') === NULL)
                      Update Profile !!!!
                    @else
                      @if (Auth::user()->daftarpkl()->count() === 0 )
                        @if(Auth::user()->mahasiswa()->value('prodi_id')!=2)
                        <a href="{{route('daftarpkl.create')}}"><i class="fa fa-briefcase"></i>Daftar PKL ke-1</a>
                        <a href="{{route('daftarpkl.create')}}"><i class="fa fa-briefcase"></i>Daftar PKL ke-2</a>
                        @else
                        <a href="{{route('daftarpkl.create')}}"><i class="fa fa-briefcase"></i>Daftar</a>
                        @endif
                      @endif

                      @if (Auth::user()->daftarpkl()->count() === 1 )
                      <?php  $a =  Auth::user()->daftarpkl()->select('id')->get()?>
                        @if(Auth::user()->mahasiswa()->value('prodi_id')!=2)
                          <a href="{{route('daftarpkl.edit', $a[0] )}}"><i class="fa fa-briefcase"></i>Daftar sem5</a>
                          <a href="{{route('daftarpkl.create')}}"><i class="fa fa-briefcase"></i>Daftar sem7</a> 
                        @else
                          <a href="{{route('daftarpkl.edit', $a[1] )}}"><i class="fa fa-briefcase"></i>Daftar</a>
                        @endif
                      @endif
                      @if (Auth::user()->daftarpkl()->count() === 2 )
                        @if(Auth::user()->mahasiswa()->value('prodi_id')!=2)
                          <?php  $a =  Auth::user()->daftarpkl()->select('id')->get()?>
                          <?php 
                            //foreach ($a as $a) {
                              //echo $a;
                            //}
                           ?>
                          <a href="{{route('daftarpkl.edit', $a[0] )}}"><i class="fa fa-briefcase"></i>Daftar PKL sem5</a>
                          <a href="{{route('daftarpkl.edit', $a[1] )}}"><i class="fa fa-briefcase"></i>Daftar PKL sem7</a>

                        @endif
                      @endif
                    @endif

                    </li>
                  @endif
                  @if (Auth::user()->roles()->first()->name == "Kaprodi")
                    <li><a href="{{route('users.show', Auth::id())}}"><i class="fa fa-female"></i> Profil </a>
                    </li>
                    <li><a><i class="fa fa-briefcase"></i> Kelola Mahasiswa<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="{{route('mhs.selectmhs')}}"> Seleksi Data Mahasiswa </a></li>
                        <li><a href="{{route('mahasiswa.index')}}"> Data Mahasiswa </a></li>
                      </ul>
                    </li>

                    </li>
                    <li><a><i class="fa fa-suitcase"></i> Kelola Dosen <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="{{route('dosen.index')}}">Data Dosen</a></li>
                        <li><a href="{{route('pembimbing.index')}}"> List Pembimbing </a></li>
                      </ul>
                    </li>

                    <li><a><i class="fa fa-suitcase"></i>Report<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('pembimbing.select')}}">Report Data Bimbingan</a></li>
                      <li><a href="{{route('pembimbing.selectdosen')}}">Report Jumlah bimbingan </a></li>
                      <li><a href="{{route('pembimbing.selectds')}}">Report Dosen Bimbingan </a></li>
                      <li><a href="{{route('daftarpkl.select')}}"> Report Data PKL </a></li>
                      <li><a href="{{route('daftarpkl.selectperusahaan')}}">Report jumlah data perPerusahaan </a></li>
                      <li><a href="{{route('daftarpkl.selectpr')}}">Report data perPerusahaan </a></li>
                    </ul>
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
                        <li><a href="{{ route('registrasi') }}">Register</a></li>
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

    <!-- Datatables -->
    <script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js') }}"></script>

  </body>
</html>