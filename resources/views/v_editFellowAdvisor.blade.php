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
                          <a href="/fellows-advisor" class="card-title d-flex align-items-center"><img class="mr-2" src="{{asset('/images/left-arrow.svg')}}" width="20px" alt="">Back</a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/fellowAdvisor/post/{{$idAdvisor}}" method="post" accept-charset="utf-8">
                          {{ csrf_field() }}
                          <div class="card-body">
                              <div class="form-group">
                                  <label for="advisor_first_name">First Name</label>
                                  <input placeholder="{{$listAdvisor[0]->first_name}}" value="{{$listAdvisor[0]->first_name}}" name="advisor_first_name" type="text" class="form-control" id="advisor_first_name">
                              </div>
                              <div class="form-group">
                                  <label for="advisor_last_name">Last Name</label>
                                  <input placeholder="{{$listAdvisor[0]->last_name}}" value="{{$listAdvisor[0]->last_name}}" name="advisor_last_name" type="text" class="form-control" id="advisor_last_name">
                              </div>
                              <div class="form-group">
                                  <label for="advisor_full_name">Full Name</label>
                                  <input placeholder="{{$listAdvisor[0]->full_name}}" value="{{$listAdvisor[0]->full_name}}" name="advisor_full_name" type="text" class="form-control" id="advisor_full_name">
                              </div>
                              {{-- <div class="form-group">
                                <label for="advisor_email">Username</label>
                                <input placeholder="{{$listAdvisor[0]->username}}" name="fellow_name" type="number" class="form-control" id="fellow_name"  disabled>
                              </div>
                              <div class="form-group">
                                <label for="advisor_email">Password</label>
                                <input placeholder="{{$listAdvisor[0]->password}}" name="fellow_name" type="number" class="form-control" id="fellow_name"  disabled>
                              </div>
                              <div class="form-group">
                                <label for="advisor_email">Email Address</label>
                                <input placeholder="{{$listAdvisor[0]->email_address}}" name="fellow_name" type="number" class="form-control" id="fellow_name"  disabled>
                              </div> --}}
                              <div class="form-group">
                                <label for="pod">Current Pod #</label>
                                <select name="pod" class="custom-select form-control-border" id="pod">
                                    <option @if($listAdvisor[0]->current_pod == "Y21 June_1") selected @endif value="Y21 June_1">Y21 June_1</option>
                                    <option @if($listAdvisor[0]->current_pod == "Y21 June_2") selected @endif value="Y21 June_2">Y21 June_2</option>
                                    <option @if($listAdvisor[0]->current_pod == "Y21 June_3") selected @endif value="Y21 June_3">Y21 June_3</option>
                                    <option @if($listAdvisor[0]->current_pod == "Y21 June_4") selected @endif value="Y21 June_4">Y21 June_4</option>
                                    <option @if($listAdvisor[0]->current_pod == "Y21 June_5") selected @endif value="Y21 June_5">Y21 June_5</option>
                                    <option @if($listAdvisor[0]->current_pod == "Y21 June_6") selected @endif value="Y21 June_6">Y21 June_6</option>
                                    <option @if($listAdvisor[0]->current_pod == "Y21 August_1") selected @endif value="Y21 August_1">Y21 August_1</option>
                                    <option @if($listAdvisor[0]->current_pod == "Y21 August_9") selected @endif value="Y21 August_9">Y21 August_9</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="class_size">Max. Class Size (Fellows)</label>
                                <input placeholder="{{$listAdvisor[0]->class_size}}" value="{{$listAdvisor[0]->class_size}}" name="class_size" type="number" class="form-control" id="class_size">
                              </div>
                              <div class="form-group">
                                <label for="primary_stream">Primary Industry</label>
                                <select name="primary_stream" class="custom-select form-control-border" id="primary_stream">
                                    <option @if($listAdvisor[0]->primary_stream == "Accounting / Financial Advisory (e.g., PwC, EY, Deloitte)") selected @endif value="Accounting / Financial Advisory (e.g., PwC, EY, Deloitte)">Accounting / Financial Advisory (e.g., PwC, EY, Deloitte)</option>
                                    <option @if($listAdvisor[0]->primary_stream == "Corporate (e.g., Sampoerna, Astra)") selected @endif value="Corporate (e.g., Sampoerna, Astra)">Corporate (e.g., Sampoerna, Astra)</option>
                                    <option @if($listAdvisor[0]->primary_stream == "Banking & Finance (e.g., HSBC, Citibank, BCA, Mandiri, Deutsche Bank)") selected @endif value="Banking & Finance (e.g., HSBC, Citibank, BCA, Mandiri, Deutsche Bank)">Banking & Finance (e.g., HSBC, Citibank, BCA, Mandiri, Deutsche Bank)</option>
                                    <option @if($listAdvisor[0]->primary_stream == "FMCG (e.g., Unilever, P&G, Loreal, Wings)") selected @endif value="FMCG (e.g., Unilever, P&G, Loreal, Wings)">FMCG (e.g., Unilever, P&G, Loreal, Wings)</option>
                                    <option @if($listAdvisor[0]->primary_stream == "Law (e.g., Baker Mckenzie, Denton, Allen Overy)") selected @endif value="Law (e.g., Baker Mckenzie, Denton, Allen Overy)">Law (e.g., Baker Mckenzie, Denton, Allen Overy)</option>
                                    <option @if($listAdvisor[0]->primary_stream == "Management Consulting (e.g., Mckinsey, BCG, Kearney, Accenture)") selected @endif value="Management Consulting (e.g., Mckinsey, BCG, Kearney, Accenture)">Law (e.g., Baker Mckenzie, Denton, Allen Overy)</option>
                                    <option @if($listAdvisor[0]->primary_stream == "Start-ups (e.g., Gojek, Tokopedia, Shopee, Jenius)") selected @endif value="Start-ups (e.g., Gojek, Tokopedia, Shopee, Jenius)">Start-ups (e.g., Gojek, Tokopedia, Shopee, Jenius)</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="secondary_stream">Secondary Industry</label>
                                <select name="secondary_stream" class="custom-select form-control-border" id="secondary_stream">
                                  <option @if($listAdvisor[0]->secondary_stream == "Accounting / Financial Advisory (e.g., PwC, EY, Deloitte)") selected @endif value="Accounting / Financial Advisory (e.g., PwC, EY, Deloitte)">Accounting / Financial Advisory (e.g., PwC, EY, Deloitte)</option>
                                  <option @if($listAdvisor[0]->secondary_stream == "Corporate (e.g., Sampoerna, Astra)") selected @endif value="Corporate (e.g., Sampoerna, Astra)">Corporate (e.g., Sampoerna, Astra)</option>
                                  <option @if($listAdvisor[0]->secondary_stream == "Banking & Finance (e.g., HSBC, Citibank, BCA, Mandiri, Deutsche Bank)") selected @endif value="Banking & Finance (e.g., HSBC, Citibank, BCA, Mandiri, Deutsche Bank)">Banking & Finance (e.g., HSBC, Citibank, BCA, Mandiri, Deutsche Bank)</option>
                                  <option @if($listAdvisor[0]->secondary_stream == "FMCG (e.g., Unilever, P&G, Loreal, Wings)") selected @endif value="FMCG (e.g., Unilever, P&G, Loreal, Wings)">FMCG (e.g., Unilever, P&G, Loreal, Wings)</option>
                                  <option @if($listAdvisor[0]->secondary_stream == "Law (e.g., Baker Mckenzie, Denton, Allen Overy)") selected @endif value="Law (e.g., Baker Mckenzie, Denton, Allen Overy)">Law (e.g., Baker Mckenzie, Denton, Allen Overy)</option>
                                  <option @if($listAdvisor[0]->secondary_stream == "Management Consulting (e.g., Mckinsey, BCG, Kearney, Accenture)") selected @endif value="Management Consulting (e.g., Mckinsey, BCG, Kearney, Accenture)">Law (e.g., Baker Mckenzie, Denton, Allen Overy)</option>
                                  <option @if($listAdvisor[0]->secondary_stream == "Start-ups (e.g., Gojek, Tokopedia, Shopee, Jenius)") selected @endif value="Start-ups (e.g., Gojek, Tokopedia, Shopee, Jenius)">Start-ups (e.g., Gojek, Tokopedia, Shopee, Jenius)</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="last_position">Last Position</label>
                                <input placeholder="{{$listAdvisor[0]->last_position}}" value="{{$listAdvisor[0]->last_position}}" name="last_position" type="text" class="form-control" id="last_position">
                              </div>
                              <div class="form-group">
                                <label for="last_company">Last Company</label>
                                <input placeholder="{{$listAdvisor[0]->last_company}}" value="{{$listAdvisor[0]->last_company}}" name="last_company" type="text" class="form-control" id="last_company">
                              </div>
                              <div class="form-group">
                                <label for="enrollment_key">Enrolment Key</label>
                                <input placeholder="{{$listAdvisor[0]->enrollment_key}}" value="{{$listAdvisor[0]->enrollment_key}}" name="enrollment_key" type="text" class="form-control" id="enrollment_key">
                              </div>
                              <div class="form-group">
                                <label for="calendly_link">Calendly Link</label>
                                <input placeholder="{{$listAdvisor[0]->calendly_link}}" value="{{$listAdvisor[0]->calendly_link}}" name="calendly_link" type="text" class="form-control" id="calendly_link">
                              </div>
                              <div class="form-group">
                                <label for="workshop_link">Workshop Link</label>
                                <input placeholder="{{$listAdvisor[0]->workshop_link}}" value="{{$listAdvisor[0]->workshop_link}}" name="workshop_link" type="text" class="form-control" id="workshop_link">
                              </div>
                              <div class="form-group">
                                <label for="workshop_schedule">Workshop Schedule</label>
                                <input placeholder="{{$listAdvisor[0]->workshop_schedule}}" value="{{$listAdvisor[0]->workshop_schedule}}" name="workshop_schedule" type="text" class="form-control" id="workshop_schedule">
                              </div>
                              <div class="form-group">
                                <label for="pod_connect_schedule">Pod Connect Schedule</label>
                                <input placeholder="{{$listAdvisor[0]->pod_connect_schedule}}" value="{{$listAdvisor[0]->pod_connect_schedule}}" name="pod_connect_schedule" type="text" class="form-control" id="pod_connect_schedule">
                              </div>
                              <div class="form-group">
                                <label for="fee">Fee Split</label>
                                <input placeholder="{{$listAdvisor[0]->fee}}" value="{{$listAdvisor[0]->fee}}" name="fee" type="text" class="form-control" id="fee">
                              </div>
                              <div class="form-group">
                                <label for="advisor_type">Advisor Type</label>
                                <select name="advisor_type" class="custom-select form-control-border" id="advisor_type">
                                    <option @if($listAdvisor[0]->advisor_type == "1") selected @endif value="1">Individual</option>
                                    <option @if($listAdvisor[0]->advisor_type == "2") selected @endif value="2">Tag Team</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="class">Class</label>
                                <select name="class" class="custom-select form-control-border" id="class">
                                    <option @if($listAdvisor[0]->class == "Advisor") selected @endif value="Advisor">Advisor</option>
                                    <option @if($listAdvisor[0]->class == "AIMZ Partner") selected @endif value="AIMZ Partner">AIMZ Partner</option>
                                </select>
                              </div>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
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
