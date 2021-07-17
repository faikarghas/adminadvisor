<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <h1 class="m-0">List Fellows</h1>
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
                                    {{-- <form action="/updateDataAdvisor" method="post" accept-charset="utf-8">
                                      {{ csrf_field() }}
                                      <div class="card-body">
                                      </div>
                                      <!-- /.card-body -->
                                      <div class="card-footer">
                                          <button type="submit" class="btn btn-primary">UPDATE</button>
                                      </div>
                                    </form> --}}
                                    <h2 class="mb-4">Filter</h2>
                                    <form action="">
                                      <div class="container">
                                        <div class="row">
                                          <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                              <label for="interest">Field of Interest (1st)</label>
                                              <select id="interest" name="interest" class="custom-select form-control-border" aria-label="Default select example">
                                                <option selected></option>
                                                <option value="Accounting / Financial Advisory (e.g., PwC, EY, Deloitte)">Accounting / Financial Advisory (e.g., PwC, EY, Deloitte)</option>
                                                <option value="Banking & Finance (e.g., HSBC, Citibank, BCA, Mandiri, Deutsche Bank)">Banking & Finance (e.g., HSBC, Citibank, BCA, Mandiri, Deutsche Bank)</option>
                                                <option value="Corporate (e.g., Sampoerna, Astra)">Corporate (e.g., Sampoerna, Astra)</option>
                                                <option value="FMCG (e.g., Unilever, P&G, Loreal, Wings)">FMCG (e.g., Unilever, P&G, Loreal, Wings)</option>
                                                <option value="Law (e.g., Baker Mckenzie, Denton, Allen Overy)">Law (e.g., Baker Mckenzie, Denton, Allen Overy)</option>
                                                <option value="Management Consulting (e.g., Mckinsey, BCG, Kearney, Accenture)">Management Consulting (e.g., Mckinsey, BCG, Kearney, Accenture)</option>
                                                <option value="Start-ups (e.g., Gojek, Tokopedia, Shopee, Jenius)">Start-ups (e.g., Gojek, Tokopedia, Shopee, Jenius)</option>
                                                <option value="Other">Other</option>
                                              </select>
                                            </div>
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
                                                @foreach ($listAdvisorAll as $item)
                                                  <option selected></option>
                                                  <option value="{{$item->first_name}} {{$item->last_name}}">{{$item->first_name}} {{$item->last_name}}</option>
                                                @endforeach
                                              </select>
                                            </div>
                                          </div>
                                          <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                              <label for="strength">Strength</label>
                                              <select id="strength" name="strength" class="custom-select form-control-border" aria-label="Default select example">
                                                <option selected></option>
                                                <option value="Super Strong">Super Strong</option>
                                                <option value="Strong">Strong</option>
                                                <option value="Relatively Strong">Relatively Strong</option>
                                                <option value="Mediocre">Mediocre</option>
                                              </select>
                                            </div>
                                            <div class="form-group">
                                              <label for="accept">Accepted?</label>
                                              <select id="accept" name="accept" class="custom-select form-control-border" aria-label="Default select example">
                                                <option selected></option>
                                                <option value="Accepted">Accepted</option>
                                                <option value="Waitlisted">Waitlisted</option>
                                                <option value="Rejected">Rejected</option>
                                              </select>
                                            </div>
                                            <div class="form-group">
                                              <label for="signed">Signed?</label>
                                              <select id="signed" name="signed" class="custom-select form-control-border" aria-label="Default select example">
                                                <option selected></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
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
                          <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active">Fellows</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="{{route('summary')}}">Summary</a>
                            </li>
                          </ul>
                          <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active mt-5" id="home" role="tabpanel" aria-labelledby="home-tab">
                              <table id="fellows_table" class="table table-bordered table-striped" style="overflow: auto">
                                <thead>
                                <tr>
                                  <th></th>
                                  <th>#</th>
                                  <th>Application ID</th>
                                  <th>Application Time Stamp</th>
                                  <th>First name</th>
                                  <th>Last Name</th>
                                  <th>Email address</th>
                                  <th>Phone number</th>
                                  <th>Gender</th>
                                  <th>University</th>
                                  <th>GPA</th>
                                  <th>How did you know about AIMZ?</th>
                                  <th>Job hunting stage</th>
                                  <th>No. of past internships</th>
                                  <th>Experience in MNC/top company?</th>
                                  <th>Field of Interest (1st priority)</th>
                                  <th>Field of Interest (2nd priority)</th>
                                  <th>Primary target roles/th>
                                  <th>Salary expectation</th>
                                  <th>Timeline to start working</th>
                                  <th>Reason to join AIMZ</th>
                                  <th>CV link</th>
                                  <th>Referee's name</th>
                                  <th>Referee's whatsapp number</th>
                                  <th>Referee's email</th>
                                  <th>Bootcamp Batch</th>
                                  <th>Profile Strength</th>
                                  <th>Advisor</th>
                                  <th>AIMZ Remarks</th>
                                  <th>Advisor Remarks</th>
                                  <th>Accepted?</th>
                                  <th>Reason for rejection</th>
                                  <th>Internal Comments</th>
                                  <th>Contract Signed?</th>
                                  <th>Fellow status</th>
                                </tr>
                                </thead>
                                <tbody>
                                  @foreach($listFellows as $key => $value)
                                      <tr data-key={{$key+1}}>
                                        <td height="30"><a href="/edit-fellows/{{$value->app_id}}">edit</a></td>
                                        <td height="30">{{$key+1}}</td>
                                        <td height="30">{{$value->app_id}}</td>
                                        <td height="30">{{$value->date}}</td>
                                        <td height="30">{{$value->first_name}}</td>
                                        <td>{{$value->last_name}}</td>
                                        <td height="30">{{$value->email_address}}</td>
                                        <td height="30">{{$value->phone}}</td>
                                        <td height="30">{{$value->gender}}</td>
                                        <td height="30">{{$value->university}}</td>
                                        <td height="30">{{$value->gpa}}</td>
                                        <td height="30">{{$value->question_1}}</td>
                                        <td height="30">{{$value->question_2}}</td>
                                        <td height="30">{{$value->question_3}}</td>
                                        <td height="30">{{$value->question_4}}</td>
                                        <td height="30">{{$value->question_5}}</td>
                                        <td height="30">{{$value->question_6}}</td>
                                        <td height="30">{{$value->question_7}}</td>
                                        <td height="30">{{$value->question_8}}</td>
                                        <td height="30">{{$value->question_9}}</td>
                                        <td height="30">{{$value->reason_to_join}}</td>
                                        <td height="30"><a href="{{$value->resume}}" target="_blank" rel="noopener">{{$value->resume}}</a></td>
                                        <td height="30">{{$value->referee_name}}</td>
                                        <td height="30">{{$value->referee_wa}}</td>
                                        <td height="30">{{$value->referee_email}}</td>
                                        <td height="30">{{$value->bootcamp_batch}}</td>
                                        <td height="30">
                                          @foreach ($appointmentSpdata as $item)
                                            @if ($value->app_id == $item->app_id)
                                            {{$item->profile_strength}}
                                            @endif
                                          @endforeach
                                        </td>
                                        <td height="30">
                                          @foreach ($appointmentSpdata as $item)
                                            @if ($value->app_id == $item->app_id)
                                            {{$item->full_name}}
                                            @endif
                                          @endforeach
                                        </td>
                                        <td height="30">
                                          @foreach ($appointmentSpdata as $item)
                                            @if ($value->app_id == $item->app_id)
                                            {{$item->aimz_remarks}}
                                            @endif
                                          @endforeach
                                        </td>
                                        <td height="30">
                                          @foreach ($appointmentSpdata as $item)
                                            @if ($value->app_id == $item->app_id)
                                            {{$item->advisor_remarks}}
                                            @endif
                                          @endforeach
                                        </td>
                                        <td height="30">
                                          @foreach ($appointmentSpdata as $item)
                                            @if ($value->app_id == $item->app_id)
                                            {{$item->accepted}}
                                            @endif
                                          @endforeach
                                        </td>
                                        <td height="30">
                                          @foreach ($appointmentSpdata as $item)
                                            @if ($value->app_id == $item->app_id)
                                            {{$item->reason_for_rejection}}
                                            @endif
                                          @endforeach
                                        </td>
                                        <td height="30">
                                          @foreach ($appointmentSpdata as $item)
                                            @if ($value->app_id == $item->app_id)
                                            {{$item->internal_comments}}
                                            @endif
                                          @endforeach
                                        </td>
                                        <td height="30">
                                          @foreach ($appointmentSpdata as $item)
                                            @if ($value->app_id == $item->app_id)
                                            {{$item->contract_signed}}
                                            @endif
                                          @endforeach
                                        </td>
                                        <td height="30">
                                          @foreach ($appointmentSpdata as $item)
                                            @if ($value->app_id == $item->app_id)
                                            {{$item->fellow_status}}
                                            @endif
                                          @endforeach
                                        </td>
                                      </tr>
                                  @endforeach
                                </tbody>

                              </table>
                            </div>
                            <div class="tab-pane fade mt-5" id="summary" role="tabpanel" aria-labelledby="summary-tab">
                            </div>
                          </div>
                        </div>
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
<script>
  $(document).ready(function() {
    var table = $('#fellows_table').DataTable({
      fixedHeader: true,
      scrollX: true,
      scrollY:        '70vh',
      scrollCollapse: true,
      dom: 'Bfrtip',
      buttons: [
          'csv', 'excel'
      ],
      columnDefs: [
            { width: 200, targets: 2 },
            { width: 100, targets: 3 },
            { width: 100, targets: 4 },
            { width: 100, targets: 5 },
            { width: 100, targets: 6 },
            { width: 100, targets: 7 },
            { width: 100, targets: 8 },
            { width: 100, targets: 9 },
            { width: 50, targets: 10 },
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
            { width: 200, targets: 24 },
            { width: 200, targets: 25 },
            { width: 200, targets: 26 },
            { width: 200, targets: 27 },
            { width: 200, targets: 28 },
            { width: 200, targets: 29 },
            { width: 200, targets: 30 },
            { width: 200, targets: 31 },
            { width: 200, targets: 32 },
            { width: 200, targets: 33 },
            { width: 200, targets: 34 },
      ],
    });

    $('#interest').on('change',function (params) {
      table.column(15).search(this.value).draw();
    })
    $('#batch').on('change',function (params) {
      table.column(25).search(this.value).draw();
    })
    $('#advisor').on('change',function (params) {
      table.column(27).search(this.value).draw();
    })
    $('#strength').on('change',function (params) {
      table.column(26).search(this.value).draw();
    })
    $('#accept').on('change',function (params) {
      table.column(30).search(this.value).draw();
    })
    $('#signed').on('change',function (params) {
      table.column(33).search(this.value).draw();
    })


  });



</script>
</body>
</html>
