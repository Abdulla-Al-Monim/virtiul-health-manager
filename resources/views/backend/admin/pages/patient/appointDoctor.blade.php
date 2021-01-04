@extends('backend.admin.layout.template')
@section('dashboard-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Appoint Patient</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashbord')}}">Dashbord</a></li>
              <li class="breadcrumb-item active">Manage Patient</li>
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
                        <th scope="col">Status</th>
                        <th scope="col">Transection Type</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Transaction Number</th>
                        <th scope="col">Approve</th>
                      </tr>
                    </thead>
                  <tbody>
                    @php
                      $i = 1;
                    @endphp
                    @foreach($appointDoctors as $appointDoctor)
                    <tr>
                      <td scope="row">
                        <a href="{{route('patient.show',$appointDoctor->patient_id)}}" class=" ">{{$i}}</a>
                      </td>
                      <td>{{$appointDoctor->doctor_name}}</td>
                      <td>{{$appointDoctor->patient_name}}</td>
                      <td>
                        @if($appointDoctor->status == 0)
                        
                         <span class="badge badge-danger">Deactive</span>
                        
                        @else
                        
                          <span class="badge badge-success">Active</span>
                        
                        @endif
                      </td>

                      <td>
                        @if($appointDoctor->transaction_type == 0)
                          <span class="badge badge-success"><img src="{{asset('icon/bkash_favicon_0.ico')}}">BKASH</span>
                        @else
                          <span class="badge badge-success"><img src="{{asset('icon/favicon .ico')}}">ROKET</span>
                        @endif
                      </td>
                      <td>
                        
                        {{$appointDoctor->transaction_number}}
                      </td>
                      <td>{{$appointDoctor->transaction_id}}</td>
                      <td>

	                    <div class="col-md-12">
                              <a href="" class="  " data-toggle="modal" data-target="#appointDoctor{{ $appointDoctor->id }}"><i class="fa fa-check" aria-hidden="true"></i></a>
                            </div>
                          </div>          
                          <!-- Modal Start -->
                            <div class="modal fade" id="appointDoctor{{ $appointDoctor->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Approve Patient</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="action-btn">
                                      <form action="{{ route('appointDoctor.approve', $appointDoctor->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Confirm</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </form>
                                      
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