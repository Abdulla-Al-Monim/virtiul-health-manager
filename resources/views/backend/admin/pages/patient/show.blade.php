@extends('backend.admin.layout.template')
@section('dashboard-content')


	<div class="content-wrapper" style="min-height: 1416.81px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
			<div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                	@if($patient->image == NULL)
                        
                            no image found
                        
                          @else
                        
                  <img class="profile-user-img img-fluid img-circle" src="{{ asset('backend/img/patients/' . $patient->image)}}" alt="User profile picture">
                  @endif
                </div>

                <h3 class="profile-username text-center">{{$patient->name}}</h3>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Phpne</b> <a class="float-right">{{$patient->name}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{$patient->email}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Address</b> <a class="float-right">{{$patient->address}}</a>
                  </li>
                </ul>

                <a href="{{route('admin.patient.prescriptions',$patient->id)}}" class="btn btn-primary btn-block"><b>Prescription</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- Profile Image -->
            
            <!-- /.card -->

           
          </div>
          <!-- /.col -->
          <!-- <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                
                 <!-- About Me Box -->
           
            <!-- /.card -->

              </div><!-- /.card-header -->
            </div>
            <!-- /.card -->
          </div> -->
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection

