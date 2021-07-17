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
            <h1 class="m-0">Fellows Progress</h1>
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
                                  <h2 class="mb-4">Filter</h2>
                                  <form action="">
                                    <div class="container">
                                      <div class="row">
                                        <div class="col-12 col-lg-6">
                                          <div class="form-group">
                                            <label for="batch">Batch</label>
                                            <select id="batch" name="batch" class="custom-select form-control-border" aria-label="Default select example">
                                              <option selected></option>
                                              <option value="Y21 August">Y21 August</option>
                                            </select>
                                          </div>
                                          <div class="form-group">
                                            <label for="advisor">Advisor (assigned to)</label>
                                            <select id="advisor" name="advisor" class="custom-select form-control-border" aria-label="Default select example">
                                              <option selected></option>
                                              @foreach ($listAdvisor as $item)
                                                <option value="{{$item->first_name}} {{$item->last_name}}">{{$item->first_name}} {{$item->last_name}}</option>
                                              @endforeach
                                            </select>
                                          </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                          <div class="form-group">
                                            <label for="status">Status</label>
                                            <select id="status" name="accept" class="custom-select form-control-border" aria-label="Default select example">
                                              <option selected></option>
                                              <option value="Admitted">Admitted</option>
                                              <option value="Withdrew">Withdrew</option>
                                              <option value="Employed">Employed</option>
                                              <option value="Invoiced">Invoiced</option>
                                              <option value="Paid">Paid</option>
                                            </select>
                                          </div>
                                          <div class="form-group">
                                            <label for="pod">Advisor Pod</label>
                                            <select id="pod" name="pod" class="custom-select form-control-border" aria-label="Default select example">
                                              <option selected></option>
                                              <option value="Y21 August_1">Y21 August_1</option>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="fellowsProgress_table" class="table table-bordered table-striped" style="overflow: auto">
                                <thead>
                                <tr>
                                  <th></th>
                                  <th>#</th>
                                  <th>Fellow Name</th>
                                  <th>Email Address</th>
                                  <th>CV Link</th>
                                  <th>Field of Interest (1st priority)</th>
                                  <th>Field of Interest (2st priority)</th>
                                  <th>Primary Target Roles</th>
                                  <th>Job Hunting Stage</th>
                                  <th>CV Finalized</th>
                                  <th>Response Board Finalized</th>
                                  <th># of Ongoing Applications</th>
                                  <th># of Upcoming Applications</th>
                                  <th>Target Companies</th>
                                  <th>Comments</th>
                                  <th>Status</th>
                                  <th>Employer (If Employed)</th>
                                  <th>Employed Date</th>
                                  <th>Invoice Amount</th>
                                  <th>Payment Method</th>
                                  <th>Paid Amount</th>
                                  <th>Batch</th>
                                  <th>Advisor</th>
                                  <th>Advisor Pod</th>
                                </tr>
                                </thead>
                                <tbody>
                                  @foreach($listFellows as $key => $value)
                                      <tr data-key={{$key+1}}>
                                        <td height="30"><a href="/edit-fellowsProgress/{{$value->app_id}}">edit</a></td>
                                        <td height="30">{{$key+1}}</td>
                                        <td height="30">{{$value->first_name}} {{$value->last_name}}</td>
                                        <td height="30">{{$value->email_address}}</td>
                                        <td height="30"><a href="{{$value->resume}}" target="_blank" rel="noopener">{{$value->resume}}</a></td>
                                        <td height="30">{{$value->question_5}}</td>
                                        <td height="30">{{$value->question_6}}</td>
                                        <td height="30">{{$value->question_7}}</td>
                                        <td height="30">{{$value->question_2}}</td>
                                        <td height="30">
                                          @foreach ($appointmentSpdata as $item)
                                            @if ($value->app_id == $item->app_id)
                                            {{$item->cv_finalized}}
                                            @endif
                                          @endforeach
                                        </td>
                                        <td height="30">
                                          @foreach ($appointmentSpdata as $item)
                                            @if ($value->app_id == $item->app_id)
                                            {{$item->response_board_finalized}}
                                            @endif
                                          @endforeach
                                        </td>
                                        <td height="30">
                                          @foreach ($appointmentSpdata as $item)
                                            @if ($value->app_id == $item->app_id)
                                            {{$item->ongoing_applications}}
                                            @endif
                                          @endforeach
                                        </td>
                                        <td height="30">
                                          @foreach ($appointmentSpdata as $item)
                                            @if ($value->app_id == $item->app_id)
                                            {{$item->upcoming_applications}}
                                            @endif
                                          @endforeach
                                        </td>
                                        <td height="30">
                                          @foreach ($appointmentSpdata as $item)
                                            @if ($value->app_id == $item->app_id)
                                            {{$item->target_companies}}
                                            @endif
                                          @endforeach
                                        </td>
                                        <td height="30">
                                          @foreach ($appointmentSpdata as $item)
                                            @if ($value->app_id == $item->app_id)
                                            {{$item->comments}}
                                            @endif
                                          @endforeach
                                        </td>
                                        <td height="30">
                                          @foreach ($appointmentSpdata as $item)
                                            @if ($value->app_id == $item->app_id)
                                            {{$item->status}}
                                            @endif
                                          @endforeach
                                        </td>
                                        <td height="30">
                                          @foreach ($appointmentSpdata as $item)
                                            @if ($value->app_id == $item->app_id)
                                            {{$item->employer}}
                                            @endif
                                          @endforeach
                                        </td>
                                        <td height="30">
                                          @foreach ($appointmentSpdata as $item)
                                            @if ($value->app_id == $item->app_id)
                                            {{$item->employed_date}}
                                            @endif
                                          @endforeach
                                        </td>
                                        <td height="30">
                                          @foreach ($appointmentSpdata as $item)
                                            @if ($value->app_id == $item->app_id)
                                            {{$item->invoice_amount}}
                                            @endif
                                          @endforeach
                                        </td>
                                        <td height="30">
                                          @foreach ($appointmentSpdata as $item)
                                            @if ($value->app_id == $item->app_id)
                                            {{$item->payment_method}}
                                            @endif
                                          @endforeach
                                        </td>
                                        <td height="30">
                                          @foreach ($appointmentSpdata as $item)
                                            @if ($value->app_id == $item->app_id)
                                            {{$item->paid_amount}}
                                            @endif
                                          @endforeach
                                        </td>
                                        <td height="30">
                                          @foreach ($appointmentSpdata as $item)
                                            @if ($value->app_id == $item->bootcamp_batch)
                                            {{$item->paid_amount}}
                                            @endif
                                          @endforeach
                                        </td>
                                        <td height="30">
                                          @foreach ($appointmentSpdata as $item)
                                            @if ($value->app_id == $item->app_id)
                                            {{$item->first_name}} {{$item->last_name}}
                                            @endif
                                          @endforeach
                                        </td>
                                        <td height="30">
                                          @foreach ($appointmentSpdata as $item)
                                            @if ($value->app_id == $item->app_id)
                                            {{$item->current_pod}}
                                            @endif
                                          @endforeach
                                        </td>
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
    var table = $("#fellowsProgress_table").DataTable({
      fixedHeader: true,
      scrollX: true,
      scrollY:        '70vh',
      scrollCollapse: true,
      dom: 'Bfrtip',
      buttons: [
          'csv', 'excel'
      ],
    })

    $('#batch').on('change',function (params) {
      table.column(21).search(this.value).draw();
    })
    $('#advisor').on('change',function (params) {
      table.column(22).search(this.value).draw();
    })
    $('#status').on('change',function (params) {
      table.column(15).search(this.value).draw();
    })
    $('#pod').on('change',function (params) {
      table.column(27).search(this.value).draw();
    })

  });
</script>

</body>
</html>
