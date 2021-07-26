<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
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
          </div>
          <div class="col-6 text-right">
            {{-- <form action="/updateData" method="post" accept-charset="utf-8" class="text-right"> --}}
              {{-- {{ csrf_field() }} --}}
              {{-- <button type="submit" class="btn btn-light save-data">
                <img src="{{asset('images/sync.svg')}}" width="30px" alt="" srcset="">
              </button> --}}
            {{-- </form> --}}
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
                                                <option value="">Other</option>
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
                                                 <option selected></option>
                                                 <option value="unassigned">unassigned</option>
                                                @foreach ($listAdvisorAll as $item)
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
                                                <option value="Open (undecided)">Open (undecided)</option>
                                                <option value="Accepted">Accepted</option>
                                                <option value="Waitlisted (accept)">Waitlisted (accept)</option>
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
                              <a class="nav-link" href="{{route('summary')}}">Summary - Acceptance</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="{{route('summary-signed')}}">Summary - Signed</a>
                            </li>
                          </ul>
                          <div class="tab-content" id="myTabContent">
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
                                      <form id="bacth_bulk_edit" action="/bulk-batch/post" method="post" accept-charset="utf-8" class="mb-5">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                          <label for="batchBulk">Batch</label>
                                          <select id="batchBulk" name="batchBulk" class="custom-select form-control-border" aria-label="Default select example">
                                            <option selected></option>
                                            <option value="Y21 August">Y21 August</option>
                                          </select>
                                        </div>
                                        <div class="form-group">
                                          <label for="strengthBulk">Strength</label>
                                          <select id="strengthBulk" name="strengthBulk" class="custom-select form-control-border" aria-label="Default select example">
                                            <option selected></option>
                                            <option value="Super Strong">Super Strong</option>
                                            <option value="Strong">Strong</option>
                                            <option value="Relatively Strong">Relatively Strong</option>
                                            <option value="Mediocre">Mediocre</option>
                                          </select>
                                        </div>
                                        <div class="form-group">
                                          <label for="advisorBulk">Advisor (assigned to)</label>
                                          <select id="advisorBulk" name="advisorBulk" class="custom-select form-control-border" aria-label="Default select example">
                                            @foreach ($listAdvisorAll as $item)
                                              <option selected></option>
                                              <option value="{{$item->id_advisor}}">{{$item->first_name}} {{$item->last_name}}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                        <div class="form-group">
                                          <label for="contractBulk">Contract Signed</label>
                                          <select name="contractBulk" class="custom-select form-control-border" id="contractBulk">
                                              <option selected></option>
                                              <option value="0">No</option>
                                              <option value="1">Yes</option>
                                          </select>
                                        </div>
                                        <div class="form-group">
                                          <label for="statusBulk">Fellow Status</label>
                                          <select name="statusBulk" class="custom-select form-control-border" id="statusBulk">
                                              <option selected></option>
                                              <option value="0">Open</option>
                                              <option value="1">Accepted</option>
                                              <option value="2">Waitlisted (accept)</option>
                                              <option value="3">Withdrew</option>
                                          </select>
                                        </div>
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
                                          <input  id="list_id" type="text" name="list_id" value="">
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

                              <table id="fellows_table" class="table table-bordered table-striped" style="overflow: auto">
                                <thead>
                                <tr>
                                  <th>
                                    <input type="checkbox" value="" id="checkAll">
                                  </th>
                                  <th></th>
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
                                  <th>Primary target roles</th>
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
                                        <td>
                                          <input class="messageCheckbox" type="checkbox" value="{{$value->app_id}}" name="mailId[]">
                                        </td>
                                        <td height="30">
                                          <a href="/edit-fellows/{{$value->app_id}}">
                                              <img src="{{asset('images/edit.svg')}}" width="20px" alt="">
                                          </a>
                                        </td>
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
                                        <td height="30">
                                          <div style="height: 90px;overflow: auto">
                                            {{$value->reason_to_join}}
                                          </div>
                                        </td>
                                        <td height="30"><a href="{{$value->resume}}" target="_blank" rel="noopener">{{$value->resume}}</a></td>
                                        <td height="30">{{$value->referee_name}}</td>
                                        <td height="30">{{$value->referee_wa}}</td>
                                        <td height="30">{{$value->referee_email}}</td>
                                        <td height="30">{{$value->bootcamp_batch}}</td>
                                        <td height="30">
                                            {{$value->profile_strength}}
                                        </td>
                                        <td height="30">
                                          @if ($value->id_advisor == 0)
                                            unassigned
                                          @else
                                            @foreach ($listAdvisorAll as $item)
                                                @if ($value->id_advisor == $item->id_advisor)
                                                    {{$item->full_name}}
                                                @endif
                                            @endforeach
                                          @endif
                                        </td>
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
                                        <td height="30">
                                            {{$value->internal_comments}}
                                        </td>
                                        <td height="30">
                                              @if ($value->contract_signed == 0)
                                                  No
                                              @else
                                                  Yes
                                              @endif
                                        </td>
                                        <td height="30">
                                              @if ($value->fellow_status == 0)
                                                Open
                                              @elseif($value->fellow_status == 1)
                                                Accepted
                                              @elseif($value->fellow_status == 2)
                                                Waitlisted (accept)
                                              @elseif($value->fellow_status == 3)
                                                Withdrew
                                              @endif
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


  <div class="overlay-loader-sync"></div>
  <div class="loader-sync"><div class="lds-dual-ring"></div></div>

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
{{-- <script src="{{asset('template')}}/dist/js/demo.js"></script> --}}
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

<script>
  $(document).ready(function() {

    var table = $('#fellows_table').DataTable({
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
            { width: 400, targets: 19 },
            { width: 400, targets: 20 },
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
      ],
    });


    let getLocal1 = localStorage.getItem("interest")
    let getLocal2 = localStorage.getItem("batch")
    let getLocal3 = localStorage.getItem("advisor")
    let getLocal4 = localStorage.getItem("strength")
    let getLocal5 = localStorage.getItem("accept")
    let getLocal6 = localStorage.getItem("signed")

    getLocal1 ? table.column(15).search(getLocal1).draw() : null
    getLocal2 ? table.column(25).search(getLocal2).draw() : null
    getLocal3 ? table.column(27).search(getLocal3).draw() : null
    getLocal4 ? table.column(26).search(getLocal4).draw() : null
    getLocal5 ? table.column(30).search(getLocal5).draw() : null
    getLocal6 ? table.column(33).search(getLocal6).draw() : null


    $('#interest').on('change',function (params) {
      table.column(15).search(this.value).draw();
      localStorage.setItem("interest", this.value);
    })
    $('#batch').on('change',function (params) {
      table.column(25).search(this.value).draw();
      localStorage.setItem("batch", this.value);
    })
    $('#advisor').on('change',function (params) {
      table.column(27).search(this.value).draw();
      localStorage.setItem("advisor", this.value);
    })
    $('#strength').on('change',function (params) {
      table.column(26).search(this.value).draw();
      localStorage.setItem("strength", this.value);
    })
    $('#accept').on('change',function (params) {
      table.column(30).search(this.value).draw();
      localStorage.setItem("accept", this.value);
    })
    $('#signed').on('change',function (params) {
      table.column(33).search(this.value).draw();
      localStorage.setItem("signed", this.value);
    })

    $(`#interest option[value="${getLocal1}"]`).attr('selected','selected');
    $(`#batch option[value="${getLocal2}"]`).attr('selected','selected');
    $(`#advisor option[value="${getLocal3}"]`).attr('selected','selected');
    $(`#strength option[value="${getLocal4}"]`).attr('selected','selected');
    $(`#accept option[value="${getLocal5}"]`).attr('selected','selected');
    $(`#signed option[value="${getLocal6}"]`).attr('selected','selected');


    /////////////////////////////////////////

    var dataku = []

    $(".getselect").click(function (e) {
        $('.messageCheckbox:checked').each(function (params) {
          dataku.push($(this).val())
        });

        var uniq = [ ...new Set(dataku) ];
        var stringData = uniq.join(',')
        $('#list_id').val(stringData)

    });

    $('.save-data').on('click',function (e) {

      $('.loader-sync').show()
      $('.overlay-loader-sync').show()

      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      });
      e.preventDefault();

      var type = "POST";
      var ajaxurl = 'updateData';
      var token = $('meta[name="csrf-token"]').attr('content')
      $.ajax({
            type: type,
            url: ajaxurl,
            data: { '_token': token, 'someOtherData': 'someOtherData' },
            dataType: 'json',
            success: function (data) {
              console.log(data.respond,'data');
              console.log(data);
              if (data.respond == 'success') {
                $('.loader-sync').hide()
                $('.overlay-loader-sync').hide()
                Swal.fire(
                  'Good job!',
                  '',
                  'success'
                )
              }
            },
            error: function (data) {
                console.log(data,'error');
            }
      });

    })

    $("#checkAll").click(function () {
      $('input:checkbox').not(this).prop('checked', this.checked);
    });

  });


</script>
</body>
</html>
