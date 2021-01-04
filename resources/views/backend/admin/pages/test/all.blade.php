@extends('backend.admin.layout.template')
@section('dashboard-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Test</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashbord')}}">Dashbord</a></li>
              <li class="breadcrumb-item active">Prescription List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Manage </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                <div class="table-responsive">
                  <table class="table table-resposive">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col"># Si</th>
                        <th scope="col">Doctor Name</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Patient Email</th>
                        <th scope="col">Patient Problem</th>
                        <th scope="col">Test Name</th>
                        <th scope="col">Test Report</th>
                        <th scope="col">Report Crate</th>
                      </tr>
                    </thead>
                  <tbody>
                    @php
                      $i = 1;
                    @endphp
                    @foreach($tests as $test)
                    <tr>
                      <td scope="row">
                      	{{$i}}
                      </td>
                      <td>{{$test->doctor_name}}</td>
                      <td>{{$test->pattient_name}}</td>
                      <td>{{$test->pattient_phone}}</td>
                      <td>{{$test->pattient_email}}</td>
                      <td>{{$test->pattient_problem}}</td>
                      <td>{{$test->Test_name}}</td>
                      <td>
                      	@if($test->Test_report == null)
                      	No Report Found
                      	@else
                      	{{$test->Test_report}}
                      	@endif
                      </td>
                      <td>
                        <div class="">
                          
                              <a href="" class="  " data-toggle="modal" data-target="#appointDoctor{{ $test->id }}">Report</a>
                                    
                          <!-- Modal Start -->
                            <div class="modal fade" id="appointDoctor{{ $test->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Report</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="action-btn">
                                      @if( Route::has('login'))
                                      @auth
                                      <form action="{{ route('test.update',$test->id)}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                          <label>Report</label>
                                          <input type="text" name="Test_report" class="form-control" autocomplete="off">
                                        </div>
                                        <button type="submit" class="btn btn-success">Confirm</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </form>
                                          @endif
                                       @endif
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- Modal End -->
                        </div>
                      </td>
                    </tr>
                    
                    @php
                      $i++;
                    @endphp
                    @endforeach
                  </tbody>
                </table>
                </div>
                

                
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
 @endsection