<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard 2</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('template/')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('template/')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('template/')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('template/')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('template/')}}/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>
<body class="hold-transition  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
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
            <a href="/fellows" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Fellows
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/fellows-progress" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Fellows Progress
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/fellowsAdvisor" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Advisor
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
                            <table id="table2" class="table table-bordered table-striped" style="overflow: auto">
                                <thead>
                                    <tr>
                                        <th colspan="4"></th>
                                        <th colspan="6">Bootcamp Experience</th>
                                        <th colspan="2"></th>
                                    </tr>
                                    <tr>
                                        <th><div style="width: 100px">Amount Due</div></th>
                                        <th># of Fellows</th>
                                        <th># of Feedback</th>
                                        <th>Participation %</th>

                                        <th>Advisor Delivery</th>
                                        <th>Content Usefulness</th>
                                        <th><div style="width: 100px">Clarity on Next Steps</div></th>
                                        <th><div style="width: 100px">Connection with Advisor</div></th>
                                        <th>Feedback Quality</th>
                                        <th>Average Score</th>

                                        <th>Active Fellows</th>
                                        <th>Placement Rate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bootcampData as $key => $item)
                                        @if ($key == 0)

                                        @elseif( $key == 1)

                                        @elseif(ucwords($name) == $item['Advisor'])
                                        <tr>
                                            <td>1.000.000</td>
                                            <td>{{$item['# of fellows']}}</td>
                                            <td>{{$item['# of feedback']}}</td>

                                            <td>{{$item['participation %']}}</td>
                                            <td>{{$item['Advisor Delivery']}}</td>
                                            <td>{{$item['Content Usefulness']}}</td>

                                            <td>{{$item['Clarity on Next Steps']}}</td>
                                            <td>{{$item['Connection with Advisor']}}</td>
                                            <td>{{$item['Feedback Quality']}}</td>

                                            <td>{{$item['Weighted Avg.']}}</td>
                                            <td>0%</td>
                                            <td>0%</td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Amount Due</th>
                                    <th># of Fellows</th>
                                    <th># of Feedback</th>

                                    <th>Participation %</th>
                                    <th>Advisor Delivery</th>
                                    <th>Content Usefulness</th>

                                    <th>Clarity on Next Steps</th>
                                    <th>Connection with Advisor</th>
                                    <th>Feedback Quality</th>

                                    <th>Average Score</th>
                                    <th>Active Fellows</th>
                                    <th>Placement Rate</th>
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

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('template')}}/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('template')}}/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('template')}}/dist/js/pages/dashboard3.js"></script>


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
<script src="{{asset('js/app.js')}}"></script>

<script>
  $(document).ready(function() {
        $('#table2').DataTable();
        $('#table3').DataTable();
  });
</script>

</body>
</html>
