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
            <a href="/fellows-advisor" class="nav-link">
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
            <h1 class="m-0">Advisor</h1>
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
                                <div class="col-lg-12">
                                  {{-- <form action="/registerAdvisors" method="post" accept-charset="utf-8">
                                      {{ csrf_field() }}
                                      <div class="card-body">
                                      </div>
                                      <!-- /.card-body -->
                                      <div class="card-footer">
                                          <button type="submit" class="btn btn-primary">UPDATE</button>
                                      </div>
                                  </form>  --}}
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="advisorTable" class="table table-bordered table-striped" style="overflow: auto">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Advisor ID</th>
                                <th>Advisor Name</th>
                                <th>Email Address</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Current Pod</th>
                                <th>Class Size</th>
                                <th>Primary Industry</th>
                                <th>Secondary Industry</th>
                                <th>Last Position</th>
                                <th>Last Company</th>
                                <th>Enrolment Key</th>
                                <th>Calendly Link</th>
                                <th>Workshop Link</th>
                                <th>Workshop Schedule</th>
                                <th>Pod Connect Schedule</th>
                                <th>Fee Split</th>
                                <th>Advisor Type</th>
                                <th>Class</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($listAdvisor as $item)
                                <tr class="table1_data">
                                    <td><a href="/edit-fellowsAdvisor/{{$item->id_advisor}}">edit</a></td>
                                    <td>AVD{{str_pad($item->id_advisor, 5, '0', STR_PAD_LEFT)}}</td>
                                    <td>{{$item->full_name}}</td>
                                    <td>{{$item->email_address}}</td>
                                    <td>
                                      @foreach ($users as $value)
                                        @if ($item->id_advisor == $value->id_advisor)
                                          {{$value->username}}
                                        @endif
                                      @endforeach
                                    </td>
                                    <td>advisor#aimz123!@</td>
                                    <td>{{$item->current_pod}}</td>
                                    <td>{{$item->class_size}}</td>
                                    <td>{{$item->primary_stream}}</td>
                                    <td>{{$item->secondary_stream}}</td>
                                    <td>{{$item->last_position}}</td>
                                    <td>{{$item->last_company}}</td>
                                    <td>{{$item->enrollment_key}}</td>
                                    <td><a href="{{$item->calendly_link}}">{{$item->calendly_link}}</a></td>
                                    <td>{{$item->workshop_link}}</td>
                                    <td>{{$item->workshop_schedule}}</td>
                                    <td>{{$item->pod_connect_schedule}}</td>
                                    <td>{{$item->fee}}</td>
                                    <td>{{$item->advisor_type}}</td>
                                    <td>{{$item->class}}</td>
                                </tr>
                                @endforeach

                            </tbody>
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
        $('#advisorTable').DataTable({
          fixedHeader: true,
          scrollX: true,
          scrollY:        '70vh',
          scrollCollapse: true,
          dom: 'Bfrtip',
          buttons: [
              'csv', 'excel'
          ],
          columnDefs: [
            { width: 200, targets: 1 },
            { width: 200, targets: 2 },
            { width: 200, targets: 3 },
            { width: 200, targets: 4 },
            { width: 200, targets: 5 },
            { width: 200, targets: 6 },
            { width: 200, targets: 7 },
            { width: 200, targets: 8 },
            { width: 200, targets: 9 },
            { width: 200, targets: 10 },
            { width: 200, targets: 11 },
            { width: 200, targets: 12 },
            { width: 200, targets: 13 },
            { width: 200, targets: 14 },
            { width: 200, targets: 15 },
            { width: 200, targets: 16 },
            { width: 200, targets: 17 },
            { width: 200, targets: 18 },
            { width: 200, targets: 19 },
      ],
        });
  });
</script>

</body>
</html>
