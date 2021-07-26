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
                          <a href="/fellows" class="card-title d-flex align-items-center"><img class="mr-2" src="{{asset('/images/left-arrow.svg')}}" width="20px" alt="">Back</a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/appointment/post/{{$fellows[0]->app_id}}" method="post" accept-charset="utf-8">
                          {{ csrf_field() }}
                          <div class="card-body">
                            <div class="form-group">
                              <label for="batch">Bootcamp Batch</label>
                              <select name="batch" class="custom-select form-control-border" id="batch">
                                  <option @if($fellows[0]->bootcamp_batch == "Y21 August") selected @endif value="Y21 August">Y21 August</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="strength">Strength</label>
                              <select name="strength" class="custom-select form-control-border" id="strength">
                                  <option selected></option>
                                  <option @if($fellows[0]->profile_strength == "Mediocre") selected @endif value="Mediocre">Mediocre</option>
                                  <option @if($fellows[0]->profile_strength == "Relatively Strong") selected @endif value="Relatively Strong">Relatively Strong</option>
                                  <option @if($fellows[0]->profile_strength == "Strong") selected @endif value="Strong">Strong</option>
                                  <option @if($fellows[0]->profile_strength == "Super Strong") selected @endif value="Super Strong">Super Strong</option>
                              </select>
                            </div>
                              <div class="form-group">
                                  <label for="advisor">Advisor</label>
                                  <select name="advisor" class="custom-select form-control-border" id="advisor">
                                      <option selected></option>
                                    @foreach ($listAdvisor as $item)
                                      <option @if($fellows[0]->id_advisor == $item->id_advisor) selected @endif value="{{$item->id_advisor}}">{{$item->full_name}}</option>
                                    @endforeach
                                  </select>
                              </div>
                              <div class="form-group">
                                <label for="remarks">AIMZ Remarks</label>
                                  <input value="{{$fellows[0]->aimz_remarks}}" name="remarks" type="text" class="form-control" id="remarks">
                              </div>
                              <div class="form-group">
                                <label for="comment">Internal Comments</label>
                                  <input value="{{$fellows[0]->internal_comments}}" name="comment" type="text" class="form-control" id="comment">
                              </div>
                              <div class="form-group">
                                <label for="contract">Contract Signed</label>
                                <select name="contract" class="custom-select form-control-border" id="contract">
                                    <option selected></option>
                                    <option @if($fellows[0]->contract_signed == 0) selected @endif value="0">No</option>
                                    <option @if($fellows[0]->contract_signed == 1) selected @endif value="1">Yes</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="status">Fellow Status</label>
                                <select name="status" class="custom-select form-control-border" id="status">
                                    <option selected></option>
                                    <option @if($fellows[0]->fellow_status == 0) selected @endif value="0">Open</option>
                                    <option @if($fellows[0]->fellow_status == 1) selected @endif value="1">Accepted</option>
                                    <option @if($fellows[0]->fellow_status == 2) selected @endif value="2">Waitlisted</option>
                                    <option @if($fellows[0]->fellow_status == 3) selected @endif value="3">Withdrew</option>
                                </select>
                              </div>

                              <div class="form-group ">
                                <label>Application ID</label>
                                <input name="app_id" type="text" class="form-control" value="{{$fellows[0]->app_id}}" disabled>
                              </div>
                              <div class="form-group ">
                                <label>Application Time Stamp</label>
                                <input type="text" class="form-control" value="{{$fellows[0]->date}}" disabled>
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
                                <label>How did you know about AIMZ?</label>
                                <input type="text" class="form-control" value="{{$fellows[0]->question_1}}" disabled>
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
                                <label>Experience in MNC/top company?</label>
                                <input type="text" class="form-control" value="{{$fellows[0]->question_4}}" disabled>
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
                                <label>Reason to join AIMZ</label>
                                <textarea type="text" class="form-control" placeholder="{{$fellows[0]->reason_to_join}}" disabled></textarea>
                              </div>
                              <div class="form-group ">
                                <label>Advisor Remarks</label>
                                <textarea type="text" class="form-control" placeholder="{{$fellows[0]->advisor_remarks}}" disabled></textarea>
                              </div>
                              <div class="form-group ">
                                <label>Accept?</label>
                                <select name="accepted" class="custom-select form-control-border" id="strength" disabled>
                                  <option selected></option>
                                  <option @if($fellows[0]->accepted == "1") selected @endif value="1">Accepted</option>
                                  <option @if($fellows[0]->accepted == "2") selected @endif value="2">Waitlisted (accept)</option>
                                  <option @if($fellows[0]->accepted == "3") selected @endif value="3">Rejected</option>
                                 </select>
                              </div>
                              <div class="form-group ">
                                <label>CV link</label>
                                <div class="link_wrapper"><a href="{{$fellows[0]->resume}}">{{$fellows[0]->resume}}</a></div>
                              </div>
                              <div class="form-group ">
                                <label>Referee's name</label>
                                <input type="text" class="form-control" value="{{$fellows[0]->referee_name}}" disabled>
                              </div>
                              <div class="form-group ">
                                <label>Referee's whatsapp number</label>
                                <input type="text" class="form-control" value="{{$fellows[0]->referee_wa}}" disabled>
                              </div>
                              <div class="form-group ">
                                <label>Referee's email</label>
                                <input type="text" class="form-control" value="{{$fellows[0]->referee_email}}" disabled>
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
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>



</body>
</html>
