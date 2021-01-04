@extends('backend.patient.layout.template')
@section('dashboard-content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Doctor List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashbord')}}">Dashbord</a></li>
              <li class="breadcrumb-item active">All Doctor</li>
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
                <h3 class="card-title"></h3>

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
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Profile</th>
                        <th scope="col">Address</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Salary</th>
                        <th scope="col">From</th>
                        <th scope="col">To</th>
                        <th scope="col">Speciality</th>
                        <th scope="col">Pateint List</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                  <tbody>
                    @php
                      $i = 1;
                    @endphp
                    @foreach($doctors as $doctor)
                    <tr>
                      <th scope="row">{{$i}}</th>
                      <td>{{$doctor->name}}</td>
                      <td>{{$doctor->phone}}</td>
                      <td>{{$doctor->email}}</td>
                      <td>
                        @if($doctor->image == NULL)
                        
                          no image found
                        
                        @else
                        
                          <img src="{{ asset('backend/img/doctors/' . $doctor->image)}}" width="50">
                        
                        @endif
                      </td>
                      <td>{{$doctor->address}}</td>
                      <td>
                        @if($doctor->gender == 0)
                        
                         Male
                        
                        @else
                        
                          Female
                        
                        @endif
                      </td>
                      <td>{{$doctor->salary}}</td>
                      <td>{{$doctor->from}}</td>
                      <td>{{$doctor->to}}</td>
                      <td>
                        @php
                          $k = 1;
                        @endphp
                        @foreach($doctorSpecialities as $doctorSpeciality)
                        
                          @if($doctorSpeciality->doctor_id == $doctor->id)
                            {{ $doctorSpeciality->speciality }}
                            @php
                              $k = $k++;
                            @endphp
                           @else
                            
                          @endif
                        @endforeach
                         @if($k==1)
                         
                         @endif
                      </td>
                      <td>{{$doctor->to}}</td>

                      <td>
                        <div class="">
                          
                              <a href="" class="  " data-toggle="modal" data-target="#appointDoctor">Appoint</a>
                                    
                          <!-- Modal Start -->
                            <div class="modal fade" id="appointDoctor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are You Confirm</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="action-btn">
                                      <form action="" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Confirm</button>
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