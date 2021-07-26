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
                                <div class="col-lg-6">
                                  <form action="">
                                    <div class="container">
                                      <div class="row">
                                        <div class="col-12">
                                          <div class="form-group">
                                            <label for="batch">Batch</label>
                                            <select id="batch" name="batch" class="custom-select form-control-border" aria-label="Default select example">
                                              <option ></option>
                                              <option selected value="Y21 August">Y21 August</option>
                                            </select>
                                          </div>
                                          <div class="form-group">
                                            <label for="accept">Accepted?</label>
                                            <select id="accept" name="accept" class="custom-select form-control-border" aria-label="Default select example">
                                              <option ></option>
                                              <option selected value="Open (undecided)">Open (undecided)</option>
                                              <option value="Accepted">Accepted</option>
                                              <option value="Waitlisted (accept)">Waitlisted (accept)</option>
                                              <option value="Rejected">Rejected</option>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                                <div class="col-lg-6">
                                  <div class="summary">
                                    <p><b> Open (undecided) - <span class="op"></span> candidates waiting review</b></p>
                                    <p><b> Rejected - <span class="rj"></span> candidates rejected</b></p>
                                    <p><b> Waitlisted (accept) - <span class="wt"></span> candidates waitlisted due to capacity</b></p>
                                    <p><b> Accepted - <span class="ac"></span> applications accepted</b></p>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active">Fellows Assigned</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="{{route('signed-fellows')}}">Signed Fellows</a>
                            </li>
                          </ul>
                          <div class="tab-pane fade show active mt-5" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <button class="mb-5 getselect btn btn-dark" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                              Bulk Edit
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form id="bacth_bulk_edit" action="/bulk-accept/post" method="post" accept-charset="utf-8" class="mb-5">
                                      {{ csrf_field() }}
                                      <div class="form-group ">
                                        <label>Accept?</label>
                                        <select name="acceptedBulk" class="custom-select form-control-border" id="acceptedBulk">
                                          <option selected></option>
                                          <option value="1">Accepted</option>
                                          <option value="2">Waitlisted (accept)</option>
                                          <option value="3">Rejected</option>
                                         </select>
                                      </div>
                                      <div class="form-group d-none">
                                        <label for="list_id">ID</label>
                                        <input id="list_id" type="text" name="list_id" value="">
                                      </div>
                                    </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button form="bacth_bulk_edit" type="submit" class="btn btn-primary">Save changes</button>
                                  </div>
                                </div>
                              </div>
                            </div>


                            <table id="fellowsAssigned_table" class="table table-bordered table-striped" style="overflow: auto">
                              <thead>
                              <tr>
                                <th>
                                  <input type="checkbox" value="" id="checkAll">
                                </th>
                                <th></th>
                                <th>#</th>
                                <th>CV link</th>
                                <th>First name</th>
                                <th>Last Name</th>
                                <th>Email address</th>
                                <th>Phone number</th>
                                <th>University</th>
                                <th>GPA</th>
                                <th>Job hunting stage</th>
                                <th>No. of past internships</th>
                                <th>Field of Interest (1st priority)</th>
                                <th>Field of Interest (2nd priority)</th>
                                <th>Primary target roles</th>
                                <th>Salary expectation</th>
                                <th>Timeline to start working</th>
                                <th>Reason to join AIMZ</th>
                                <th>Bootcamp Batch</th>
                                <th>AIMZ Remarks</th>
                                <th>Advisor Remarks</th>
                                <th>Accepted?</th>
                                <th>Reason for rejection</th>
                                {{-- <th>Fellow status</th> --}}
                              </tr>
                              </thead>
                              <tbody>
                                @foreach($listFellows as $key => $value)
                                    <tr data-key={{$key+1}}>
                                      <td height="30">
                                        <input class="messageCheckbox" type="checkbox" value="{{$value->app_id}}" name="mailId[]">
                                      </td>
                                      <td height="30"><a href="/edit-fellows-assigned/{{$value->app_id}}"><img src="{{asset('images/edit.svg')}}" width="20px" alt=""></a></td>
                                      <td height="30">{{$key+1}}</td>
                                      <td height="30"><a href="{{$value->resume}}" target="_blank" rel="noopener">{{$value->resume}}</a></td>
                                      <td height="30">{{$value->first_name}}</td>
                                      <td>{{$value->last_name}}</td>
                                      <td height="30">{{$value->email_address}}</td>
                                      <td height="30">{{$value->phone}}</td>
                                      <td height="30">{{$value->university}}</td>
                                      <td height="30">{{$value->gpa}}</td>
                                      <td height="30">{{$value->question_2}}</td>
                                      <td height="30">{{$value->question_3}}</td>
                                      <td height="30">{{$value->question_5}}</td>
                                      <td height="30">{{$value->question_6}}</td>
                                      <td height="30">{{$value->question_7}}</td>
                                      <td height="30">{{$value->question_8}}</td>
                                      <td height="30">{{$value->question_9}}</td>
                                      <td height="30">
                                        <div style="height: 90px;overflow: auto">
                                          {{$value->reason_to_join}}
                                        </div>
                                      </td>
                                      <td height="30">{{$value->bootcamp_batch}}</td>
                                      <td height="30">
                                          {{$value->aimz_remarks}}
                                      </td>
                                      <td height="30">
                                          {{$value->advisor_remarks}}
                                      </td>
                                      <td height="30">
                                        @if ($value->accepted == 1)
                                        Accepted
                                        @elseif($value->accepted == 2)
                                          Waitlisted (accept)
                                        @elseif($value->accepted == 3)
                                          Rejected
                                        @elseif($value->accepted == 0)
                                          open (undecided)
                                        @endif
                                      </td>
                                      <td height="30">
                                          {{$value->reason_for_rejection}}
                                      </td>
                                      {{-- <td height="30">
                                            @if ($value->fellow_status == 0)
                                              Open
                                            @elseif($value->fellow_status == 1)
                                              Accepted
                                            @elseif($value->fellow_status == 2)
                                              Waitlisted (accept)
                                            @elseif($value->fellow_status == 3)
                                              Withdrew
                                            @endif
                                      </td> --}}
                                    </tr>
                                @endforeach
                              </tbody>

                            </table>
                          </div>
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
      var table = $("#fellowsAssigned_table").DataTable({
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
            // { width: 200, targets: 23 }

        ],
      })

      ///////////////////////////////////////////////////////////////

      // set accept filter
      table.column(21).search('Open (undecided)').draw();


      var bacthSum =null;
      var acceptSum =null;

      $('#batch').on('change',function (e) {
        table.column(18).search(this.value).draw();

        bacthSum = $(this).val()

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        e.preventDefault();

        var ajaxurl = `getFellowAssignedSummary`;
        var type = "get";
        var token = $('meta[name="csrf-token"]').attr('content')
        $.ajax({
              type: type,
              url: ajaxurl,
              data: { '_token': token,'accept':acceptSum,'batch':bacthSum},
              dataType: 'json',
              success: function (data) {
                $('.op').html(data.data[0].Blank)
                $('.rj').html(data.data[0].Rejected)
                $('.wt').html(data.data[0].Waitlisted)
                $('.ac').html(data.data[0].Accepted)

              },
              error: function (data) {
                  // console.log(data,'error');
              }
        });

      })

      $('#accept').on('change',function (e) {
        table.column(21).search(this.value).draw();

        acceptSum = $(this).val()

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        e.preventDefault();

        var ajaxurl = `getFellowAssignedSummary`;
        var type = "get";
        var token = $('meta[name="csrf-token"]').attr('content')
        $.ajax({
              type: type,
              url: ajaxurl,
              data: { '_token': token,'accept':acceptSum,'batch':bacthSum},
              dataType: 'json',
              success: function (data) {
                $('.op').html(data.data[0].Blank)
                $('.rj').html(data.data[0].Rejected)
                $('.wt').html(data.data[0].Waitlisted)
                $('.ac').html(data.data[0].Accepted)

              },
              error: function (data) {
                  // console.log(data,'error');
              }
        });
      })

      function getData(params) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var ajaxurl = `getFellowAssignedSummary`;
        var type = "get";
        var token = $('meta[name="csrf-token"]').attr('content')
        $.ajax({
              type: type,
              url: ajaxurl,
              data: { '_token': token,'accept':'Open (undecided)','batch':'Y21 August'},
              dataType: 'json',
              success: function (data) {
                $('.op').html(data.data[0].Blank)
                $('.rj').html(data.data[0].Rejected)
                $('.wt').html(data.data[0].Waitlisted)
                $('.ac').html(data.data[0].Accepted)

              },
              error: function (data) {
                  // console.log(data,'error');
              }
        });
      }

      getData()

      //////////////////////////////////////////////////////////

      var dataku = []

      $(".getselect").click(function (e) {
        $('.messageCheckbox:checked').each(function (params) {
          dataku.push($(this).val())
        });

        var uniq = [ ...new Set(dataku) ];
        var stringData = uniq.join(',')
        $('#list_id').val(stringData)
        console.log(uniq);
      });


    $("#checkAll").click(function () {
      $('input:checkbox').not(this).prop('checked', this.checked);
    });

    });
  </script>

  <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
