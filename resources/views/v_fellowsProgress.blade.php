<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMIN AIMZSEA</title>

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
                                            <select id="batch_fp" name="batch" class="custom-select form-control-border" aria-label="Default select example">
                                              <option selected></option>
                                              <option value="Y21 August">Y21 August</option>
                                            </select>
                                          </div>
                                          <div class="form-group">
                                            <label for="advisor">Advisor (assigned to)</label>
                                            <select id="advisor_fp" name="advisor" class="custom-select form-control-border" aria-label="Default select example">
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
                                            <select id="status_fp" name="accept" class="custom-select form-control-border" aria-label="Default select example">
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
                                            <select id="pod_fp" name="pod" class="custom-select form-control-border" aria-label="Default select example">
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
                                  @foreach($appointmentData as $key => $value)
                                      <tr data-key={{$key+1}}>
                                        <td height="30">
                                          <a href="/edit-fellowsProgress/{{$value->app_id}}">
                                            <img src="{{asset('images/edit.svg')}}" width="20px" alt="">
                                          </a>
                                        </td>
                                        <td height="30">{{$key+1}}</td>
                                        <td height="30">{{$value->first_name}} {{$value->last_name}}</td>
                                        <td height="30">{{$value->email_address}}</td>
                                        <td height="30"><a href="{{$value->resume}}" target="_blank" rel="noopener">{{$value->resume}}</a></td>
                                        <td height="30">{{$value->question_5}}</td>
                                        <td height="30">{{$value->question_6}}</td>
                                        <td height="30">{{$value->question_7}}</td>
                                        <td height="30">{{$value->question_2}}</td>
                                        <td height="30">
                                          @if ($value->cv_finalized == 0)
                                              No
                                          @else
                                              Yes
                                          @endif
                                        </td>
                                        <td height="30">
                                          @if ($value->response_board_finalized == 0)
                                              No
                                          @else
                                              Yes
                                          @endif
                                        </td>
                                        <td height="30">
                                            {{$value->ongoing_applications}}
                                        </td>
                                        <td height="30">
                                            {{$value->upcoming_applications}}
                                        </td>
                                        <td height="30">
                                            {{$value->target_companies}}
                                        </td>
                                        <td height="30">
                                            {{$value->comments}}
                                        </td>
                                        <td height="30">
                                            {{$value->status}}
                                        </td>
                                        <td height="30">
                                            {{$value->employer}}
                                        </td>
                                        <td height="30">
                                            {{$value->employed_date}}
                                        </td>
                                        <td height="30">
                                            {{number_format($value->invoice_amount,2,',','.')}}
                                        </td>
                                        <td height="30">
                                            {{$value->payment_method}}
                                        </td>
                                        <td height="30">
                                            {{number_format($value->paid_amount,2,',','.')}}
                                        </td>
                                        <td height="30">
                                            {{$value->bootcamp_batch}}
                                        </td>
                                        <td height="30">
                                            {{$value->full_name}}
                                        </td>
                                        <td height="30">
                                            {{$value->current_pod}}
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
      lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
      dom: 'Bflrtip',
      buttons: [
          'csv', 'excel'
      ],
      columnDefs: [
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
          { width: 200, targets: 20 },
          { width: 200, targets: 21 },
          { width: 200, targets: 22 },
          { width: 200, targets: 23 },
      ],
    })

    
    let getLocal1 = localStorage.getItem("batch_fp")
    let getLocal2 = localStorage.getItem("advisor_fp")
    let getLocal3 = localStorage.getItem("status_fp")
    let getLocal4 = localStorage.getItem("pod_fp")

    getLocal1 ? table.column(21).search(getLocal1).draw() : null
    getLocal2 ? table.column(22).search(getLocal2).draw() : null
    getLocal3 ? table.column(15).search(getLocal3).draw() : null
    getLocal4 ? table.column(23).search(getLocal4).draw() : null

    $('#batch_fp').on('change',function (params) {
      table.column(21).search(this.value).draw();
      localStorage.setItem("batch_fp", this.value);
    })
    $('#advisor_fp').on('change',function (params) {
      table.column(22).search(this.value).draw();
      localStorage.setItem("advisor_fp", this.value);
    })
    $('#status_fp').on('change',function (params) {
      table.column(15).search(this.value).draw();
      localStorage.setItem("status_fp", this.value);
    })
    $('#pod_fp').on('change',function (params) {
      table.column(23).search(this.value).draw();
      localStorage.setItem("pod_fp", this.value);
    })

    
    $(`#batch_fp option[value="${getLocal1}"]`).attr('selected','selected');
    $(`#advisor_fp option[value="${getLocal2}"]`).attr('selected','selected');
    $(`#status_fp option[value="${getLocal3}"]`).attr('selected','selected');
    $(`#pod_fp option[value="${getLocal4}"]`).attr('selected','selected');

  });
</script>

</body>
</html>
