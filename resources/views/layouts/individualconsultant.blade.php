<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 {{-- csrf token tag --}}
<meta name="csrf-token"   content="{{csrf_token()}}">
{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

     <title>@yield('title')</title>
     <link rel="shortcut icon" href="{{ asset('../storage/images/dashboardimage/titile.png') }}" type="image/x-icon">
     <link rel="stylesheet" href="{{asset('css/dashboardcss/fontawesome-free/css/all.min.css')}}">
     <!-- Ionicons -->
     <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
     <!-- Tempusdominus Bbootstrap 4 -->
     <link rel="stylesheet" href="{{asset('css/dashboardcss/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
     <!-- iCheck -->
     <link rel="stylesheet" href="{{asset('css/dashboardcss/icheck-bootstrap/icheck-bootstrap.min.css')}}">
     <!-- JQVMap -->
     <link rel="stylesheet" href="{{asset('css/dashboardcss/jqvmap/jqvmap.min.css')}}">
     <!-- Theme style -->
     <link rel="stylesheet" href="{{asset('css/dashboardcss/dist/css/adminlte.min.css')}}">
     <!-- overlayScrollbars -->
     <link rel="stylesheet" href="{{asset('css/dashboardcss/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
     <!-- Daterange picker -->
     <link rel="stylesheet" href="{{asset('css/dashboardcss/daterangepicker/daterangepicker.css')}}">
     <!-- summernote -->
     <link rel="stylesheet" href="{{asset('css/dashboardcss/summernote/summernote-bs4.css')}}">
     <!-- Google Font: Source Sans Pro -->
       <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('css/dashboardcss/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <!-- Theme style -->
     <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <!--sweetalert CSS -->
 <link href="{{asset('css/sweetalert.css')}}" rel="stylesheet" type="text/css">
    {{-- for print area select --}}
    <!-- nice image-->
    <link rel="stylesheet" href="{{asset('css/lightbox.css')}}">
    <!--sweetalert CSS -->
 <link href="{{asset('css/sweetalert.css')}}" rel="stylesheet" type="text/css">
 <!-- toastr notification start-->
 <link href="{{asset('css/toastr.css')}}" rel="stylesheet">
<script src="{{asset('js/toaster_jquery.min.js')}}"></script>
 <script src="{{asset('js/toastr.min.js')}}"></script>
  <!--toastr notification alert end -->
{{-- custom css  --}}

<link rel="stylesheet" href="{{asset('css/my-style.css')}}">
<link rel="stylesheet" href="{{asset('css/my-responsive.css')}}">
{{-- custom css  --}}
    <style>
      
      .preloader {
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         z-index: 9999;
         background-image: url('{{asset('storage/app/public/dashboardimage/lg.ajax-spinner-gif.gif')}}');
         background-repeat: no-repeat; 
         background-color: #FFF;
         background-position: center;
      }
      /* .ui-autocomplete-loading {
          background: white url('{{asset('storage/images/lg.ajax-spinner-gif.gif')}}'); right center no-repeat;
        } */
  
      
      </style>
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
  
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>
  
      <!-- SEARCH FORM -->
      {{-- <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form> --}}
  
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="{{@asset('storage/app/public/dashboardimage/img/user8-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
         <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i>
            
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">User Info</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
           
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form><i class="fa fa-sign-out pull-right"></i> Log Out
                                        </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        
       
      </ul>
      
      
    </nav>
    <!-- /.navbar -->
  
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
      <img src="{{@asset('storage/app/public/dashboardimage/dashboard-logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">LinkedSage</span>
      </a>
  
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{@asset('storage/app/public/dashboardimage/profile/'.Auth::user()->image)}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</a>
          </div>
        </div>
  
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                 <li class="nav-item has-treeview menu-open">
                  <a href="" class="nav-link ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      Dashboard
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="{{url('individualconsultant/profile')}}" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Update Profile</p>
                      </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{url('superadmin/category')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Category</p>
                      </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{url('superadmin/subcategory')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Subcategory</p>
                      </a>
                    </li>
                  </ul>
                </li>
      
  
            
  
  
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              
              <ol class="breadcrumb float-sm-right">
                <li>
                    <a href="{{url('superadmin/dashboard')}}"><i class="fa fa-home"></i> &nbsp; </a>
                    
                </li>
              &nbsp;
                @for($i =2; $i <= count(Request::segments()); $i++)
                 <li class="breadcrumb-item active" aria-current="page">
                      <a href="{{ URL::to( implode( '/', array_slice(Request::segments(), 0 ,$i, true)))}}">
                         {{ucfirst(Request::segment($i))}}
                      </a>
                   </li>
                @endfor
             </ol>


            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
  
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        {!! @Toastr::render() !!}  <!-- toastr Notification -->
        @yield('individualconsultant')
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      {{-- <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.1
      </div> --}}
    </footer>
  
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
 
  
   
  <!-- jQuery -->
  <script src="{{asset('js/dashboardjs/jquery/jquery.min.js')}}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{asset('js/dashboardjs/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  {{-- <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script> --}}
  <!-- Bootstrap 4 -->
   
    <script src="{{asset('js/dashboardjs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- ChartJS -->
  {{-- <script src="plugins/chart.js/Chart.min.js"></script> --}}
  <!-- Sparkline -->
  <script src="{{asset('js/dashboardjs/sparklines/sparkline.js')}}"></script>
  <!-- JQVMap -->
  <script src="{{asset('js/dashboardjs/jqvmap/jquery.vmap.min.js')}}"></script>
  <script src="{{asset('js/dashboardjs/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{asset('js/dashboardjs/jquery-knob/jquery.knob.min.js')}}"></script>
  <!-- daterangepicker -->
  <script src="{{asset('js/dashboardjs/moment/moment.min.js')}}"></script>
  <script src="{{asset('js/dashboardjs/daterangepicker/daterangepicker.js')}}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{asset('js/dashboardjs/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
  <!-- Summernote -->
  {{-- <script src="{{asset('js/dashboardjs/summernote/summernote-bs4.min.js')}}"></script> --}}
  <!-- overlayScrollbars -->
  <script src="{{asset('js/dashboardjs/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
   <!-- AdminLTE App -->
   <script src="{{asset('js/dashboardjs/dist/js/adminlte.min.js')}}"></script>
  <!-- datatable js-->
 <script src="{{asset('js/jquery.dataTables.js')}}"></script>
 <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
    <!-- nice select 2 js-->
        <script src="{{asset('js/select2.min.js')}}"></script>
 <!-- Sweet-Alert  -->
 <script src="{{asset('js/sweetalert.min.js')}}"></script>
<script src="{{asset('js/lightbox.js')}}"></script>
 
  
    <script>
      $(".preloader").fadeOut("slow"); 
      var url = "{{URL::to('/')}}";
       $('.js-example-basic-single').select2();
       // <!-- for show datatable requre -->
      
        //   select-2
 
   //clightbox 2 js
   lightbox.option({
 'resizeDuration': 200,
 'wrapAround': true
});
   $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
         
   </script>
   {{-- <script>
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });
    });
  </script> --}}

    @yield('script')

  </body>
  </html>