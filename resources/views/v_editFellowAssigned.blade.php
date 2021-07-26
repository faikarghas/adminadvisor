<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMIN AIMZSEA</title>

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
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
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
            {{-- <li class="nav-item">
                <a href="/data-advisor" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>Advisor Profile</p>
                </a>
            </li> --}}
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
            {{-- <h1 class="m-0">Dashboard v2</h1> --}}
          </div><!-- /.col -->
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
                    <div class="card card-primary">
                        <div class="card-header">
                          <div class="container">
                            <div class="row">
                              <div class="col-12 col-lg-6 d-flex">
                                <a href="/fellows-assigned" class="card-title d-flex align-items-center"><img class="mr-2" src="{{asset('/images/left-arrow.svg')}}" width="20px" alt="">Back</a>
                              </div>
                              <div class="col-12 col-lg-6 text-right">
                                <button form="edit_fellow_assigned" type="submit" class="btn btn-light">Submit</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="edit_fellow_assigned" action="/fellowsAssigned/post/{{$fellows[0]->app_id}}" method="post" accept-charset="utf-8">
                          {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                  <label for="accept">Accept?</label>
                                  <select name="accept" class="custom-select form-control-border" id="accept">
                                      <option selected ></option>
                                      <option @if($fellows[0]->accepted == '1') selected @endif value="1">Accepted</option>
                                      <option @if($fellows[0]->accepted == '2') selected @endif value="2">Waitlisted (accept)</option>
                                      <option @if($fellows[0]->accepted == '3') selected @endif value="3">Rejected</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="reason_for_rejection">Reason for rejection</label>
                                    <textarea name="reason_for_rejection" type="text" class="form-control" id="reason_for_rejection">{{$fellows[0]->reason_for_rejection}}</textarea>
                                </div>
                                <div class="form-group">
                                  <label for="advisorRemarks">Advisor Remarks</label>
                                    <textarea name="advisorRemarks"  class="form-control" id="advisorRemarks" >{{$fellows[0]->advisor_remarks}}</textarea>
                                </div>
                                <div class="form-group ">
                                  <label>CV link</label>
                                  <div class="link_wrapper"><a target="_blank" rel="noopener" href="{{$fellows[0]->resume}}">{{$fellows[0]->resume}}</a></div>
                                </div>
                                <div class="form-group ">
                                  <label>First name</label>
                                  <input type="text" class="form-control" value="{{$fellows[0]->first_name}}" disabled>
                                </div>
                                <div class="form-group ">
                                  <label>Last Name</label>
                                  <input type="text" class="form-control" value="{{$fellows[0]->last_name}}" disabled>
                                </div>
                                <div class="form-group ">
                                  <label>Email address</label>
                                  <input type="text" class="form-control" value="{{$fellows[0]->email_address}}" disabled>
                                </div>
                                <div class="form-group ">
                                  <label>Phone number</label>
                                  <input type="text" class="form-control" value="{{$fellows[0]->phone}}" disabled>
                                </div>
                                <div class="form-group ">
                                  <label>Gender</label>
                                  <input type="text" class="form-control" value="{{$fellows[0]->gender}}" disabled>
                                </div>
                                <div class="form-group ">
                                  <label>University</label>
                                  <input type="text" class="form-control" value="{{$fellows[0]->university}}" disabled>
                                </div>
                                <div class="form-group ">
                                  <label>GPA</label>
                                  <input type="text" class="form-control" value="{{$fellows[0]->gpa}}" disabled>
                                </div>
                                <div class="form-group ">
                                  <label>Reason to join AIMZ</label>
                                  <textarea type="text" class="form-control" placeholder="{{$fellows[0]->reason_to_join}}" disabled></textarea>
                                </div>
                                <div class="form-group ">
                                  <label>Job hunting stage</label>
                                  <input type="text" class="form-control" value="{{$fellows[0]->question_2}}" disabled>
                                </div>
                                <div class="form-group ">
                                  <label>No. of past internships</label>
                                  <input type="text" class="form-control" value="{{$fellows[0]->question_3}}" disabled>
                                </div>
                                <div class="form-group ">
                                  <label>Field of Interest (1st priority)</label>
                                  <input type="text" class="form-control" value="{{$fellows[0]->question_5}}" disabled>
                                </div>
                                <div class="form-group ">
                                  <label>Field of Interest (2nd priority)</label>
                                  <input type="text" class="form-control" value="{{$fellows[0]->question_6}}" disabled>
                                </div>
                                <div class="form-group ">
                                  <label>Primary target roles</label>
                                  <input type="text" class="form-control" value="{{$fellows[0]->question_7}}" disabled>
                                </div>
                                <div class="form-group ">
                                  <label>Salary expectation</label>
                                  <input type="text" class="form-control" value="{{$fellows[0]->question_8}}" disabled>
                                </div>
                                <div class="form-group ">
                                  <label>Timeline to start working</label>
                                  <input type="text" class="form-control" value="{{$fellows[0]->question_9}}" disabled>
                                </div>
                                <div class="form-group ">
                                  <label>Bootcamp Batch</label>
                                  <input type="text" class="form-control" value="{{$fellows[0]->bootcamp_batch}}" disabled>
                                </div>
                                <div class="form-group">
                                  <label for="aimz_remarks">AIMZ Remarks</label>
                                    <input value="{{$fellows[0]->aimz_remarks}}" name="aimz_remarks" type="text" class="form-control" id="aimz_remarks" disabled>
                                </div>
                                <div class="form-group">
                                  <label for="advisor_remarks">Advisor Remarks</label>
                                    <input value="{{$fellows[0]->advisor_remarks}}" name="advisor_remarks" type="text" class="form-control" id="advisor_remarks" disabled>
                                </div>
                                <div class="form-group">
                                  <label for="fellow_status">Fellow Status</label>
                                    <input value="{{$fellows[0]->fellow_status}}" name="fellow_status" type="text" class="form-control" id="fellow_status" disabled>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            {{-- <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div> --}}
                        </form>
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

<!-- Select2 -->
<script src="{{asset('template')}}/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset('template')}}/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="{{asset('template')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('template')}}/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="{{asset('template')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="{{asset('template')}}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('template')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="{{asset('template')}}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="{{asset('template')}}/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="{{asset('template')}}/plugins/dropzone/min/dropzone.min.js"></script>
<!-- Page specific script -->


</body>
</html>
