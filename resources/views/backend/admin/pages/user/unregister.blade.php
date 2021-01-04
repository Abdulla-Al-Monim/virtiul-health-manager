@extends('backend.admin.layout.template')
@section('dashboard-content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User Manage</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashbord')}}">Dashbord</a></li>
              <li class="breadcrumb-item active">Manage User</li>
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
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Gender</th>
                        <th scope="col">User Type</th>
                        <th scope="col">Approve</th>
                      </tr>
                    </thead>
                  <tbody>
                    @php
                      $i = 1;
                    @endphp
                    @foreach($users as $user)
                    <tr>
                      <td scope="row">
                        <a href="" class=" ">{{$i}}</a>
                      </td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->phone}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->address}}</td>
                      <td>
                        @if($user->gender == 0)
                        
                         Male
                        
                        @else
                        
                          Female
                        
                        @endif
                      </td>
                      <td>{{$user->user_type}}</td>
                      <td>
                        <div class="">
                          <div class="row">
                   
                            <div class="col-md-12">
                              <a href="" class="  " data-toggle="modal" data-target="#approveUser{{ $user->id }}"><i class="fa fa-check btn-primary btn"></i></a>
                            </div>
                          </div>          
                          <!-- Modal Start -->
                            <div class="modal fade" id="approveUser{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Approve Request</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="action-btn">
                                      <form action="{{route('user.add',$user->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Approve</button>
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