<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard 2</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('template/')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('template/')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('template/')}}/plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{asset('template/')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{asset('template/')}}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('template/')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('template/')}}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('template/')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{asset('template/')}}/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{asset('template/')}}/plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{asset('template/')}}/plugins/dropzone/min/dropzone.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('template/')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('template/')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('template/')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('template/')}}/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item d-flex align-items-center">
        <a href="/logout" class="text-white">Logout</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      {{-- <img src="https://aimzsea.com/wp-content/uploads/2021/04/hq-logo.png" alt="AdminLTE Logo" class="brand-image img-circle " style="opacity: .8"> --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/fellows-assigned" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Fellows Assigned
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/fellows-progress-advisor" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Fellows Progress
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/weekly-feedback" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Weekly Feedback
              </p>
            </a>
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
            <h1 class="m-0">Welcome : {{ Auth::user()->name }}</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <!-- left column -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-12 text-right">
                                    {{-- <a href="/create-appointment" class="btn-create">Create Appointment</a> --}}
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th></th>
                              <th>Full Name</th>
                              <th>Uni Status</th>
                              <th>Full Time / Internship</th>
                              <th>Job Search Horizon</th>
                              <th># of Past Internships</th>
                              <th>Target Roles</th>
                              <th>Salary Expectation</th>
                              <th>Gender</th>
                              <th>E-mail</th>
                              <th>Contact</th>
                              {{-- <th>Reason for Joining AIMZ</th> --}}
                              <th>CV Link</th>
                              <th>Interest (1st)</th>
                              <th>Interest (2nd)</th>
                              <th>AIMZ Remarks</th>
                              <th>Advisor Remarks</th>
                              <th>Accept Admission?</th>
                              <th>Reason for Rejection</th>
                              <th>Comments (If Any)</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach ($listFellow as $item)
                                @foreach ($dataAppointment as $item2)
                                  @if ($item['Email address'] == $item2->fellowEmail)
                                      <tr>
                                        <td height="30"><a href="/edit-fellowsAssigned/{{$item['Email address']}}">edit</a></td>
                                        <td height="30">{{$item['First name']}} {{$item['Last Name']}}</td>
                                        <td height="30">{{$item['Where are you in your job hunting process?']}}</td>
                                        <td height="30">{{$item['Where are you in your job hunting process?']}}</td>
                                        <td height="30">{{$item['How soon would you be available to start working if you do get a job offer?']}}</td>
                                        <td height="30">{{$item['How many internships or work experience do you have?']}}</td>
                                        <td height="30">{{$item['What are your primary target roles in the industries that you have picked (e.g., product manager, digital marketing)?']}}</td>
                                        <td height="30">{{$item['What is your salary expectation in IDR?']}}</td>
                                        <td height="30">{{$item['Gender']}}</td>
                                        <td height="30">{{$item['Email address']}}</td>
                                        <td height="30">{{$item['Phone/Whatsapp number (we will contact you here to get in touch)']}}</td>
                                        {{-- <td height="30">{{$item['Please briefly state your primary reason(s) for joining AIMZ bootcamp to help us understand your aspirations']}}</td> --}}
                                        <td height="30">{{$item['Please drop your resume below as part of your application']}}</td>
                                        <td height="30"><div style="width: 150px; overflow:auto;">{{$item['Which primary environment are you highly interested in?']}}</div></td>
                                        <td height="30"><div style="width: 150px; overflow:auto;">{{$item['Which secondary environment(s) are you highly interested in? (If possible, please select more than 1)']}}</div></td>
                                        <td>
                                          @if ($item['Email address'] == $item2->fellowEmail)
                                              {{$item2->remarks}}
                                          @endif
                                        </td>
                                        <td>
                                          @if ($item['Email address'] == $item2->fellowEmail)
                                              {{$item2->advisorRemarks}}
                                          @endif
                                        </td>
                                        <td>
                                          @if ($item['Email address'] == $item2->fellowEmail)
                                              @if ($item2->accept == 0)
                                                  No
                                              @elseif($item2->accept == 1)
                                                  Yes
                                              @elseif($item2->accept == 2)
                                                  Yes (2nd Wave)
                                              @elseif($item2->accept == 3)
                                                  -
                                              @endif
                                          @endif
                                        </td>
                                        <td>
                                          @if ($item['Email address'] == $item2->fellowEmail)
                                              {{$item2->reason}}
                                          @endif
                                        </td>
                                        <td>
                                          @if ($item['Email address'] == $item2->fellowEmail)
                                              {{$item2->comment}}
                                          @endif
                                        </td>
                                      </tr>
                                  @endif
                                @endforeach


                              @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                              <th></th>
                              <th>Full Name</th>
                              <th>Uni Status</th>
                              <th>Full Time / Internship</th>
                              <th>Job Search Horizon</th>
                              <th># of Past Internships</th>
                              <th>Target Roles</th>
                              <th>Salary Expectation</th>
                              <th>Gender</th>
                              <th>E-mail</th>
                              <th>Contact</th>
                              {{-- <th>Reason for Joining AIMZ</th> --}}
                              <th>CV Link</th>
                              <th>Interest (1st)</th>
                              <th>Interest (2nd)</th>
                              <th>AIMZ Remarks</th>
                              <th>Advisor Remarks</th>
                              <th>Accept Admission?</th>
                              <th>Reason for Rejection</th>
                              <th>Comments (If Any)</th>
                            </tr>
                            </tfoot>
                          </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  {{-- <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer> --}}
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="{{asset('template')}}/dist/js/adminlte.js"></script>


<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('template')}}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="{{asset('template')}}/plugins/raphael/raphael.min.js"></script>
<script src="{{asset('template')}}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="{{asset('template')}}/plugins/jquery-mapael/maps/usa_states.min.js"></script>


<!-- AdminLTE for demo purposes -->
<script src="{{asset('template')}}/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('template')}}/dist/js/pages/dashboard2.js"></script>


<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('template')}}/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('template')}}/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('template')}}/dist/js/pages/dashboard3.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('template')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('template')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('template')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('template')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(function () {
      $("#example1").DataTable()
    });
  </script>

  <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
