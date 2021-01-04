@extends('backend.admin.layout.template')
@section('dashboard-content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Speciality</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashbord')}}">Dashbord</a></li>
              <li class="breadcrumb-item active">Update Doctor</li>
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
            <div class="card">
              
              <div class="card-body">
                <h6 class="card-title">Update Doctor</h6>

                <p class="card-text"></p>
                  <form action="{{route('doctor.update',$doctor->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" name="name" class="form-control" value="{{$doctor->name}}" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label>Phone</label>
                          <input type="text" name="phone" class="form-control" autocomplete="off"value="{{$doctor->phone}}">
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control" autocomplete="off"value="{{$doctor->email}}">
                        </div>
                        <div class="form-group">
                          @if($doctor->image == NULL)
                        
                            no image found
                        
                          @else
                        
                            <img src="{{ asset('backend/img/doctors/' . $doctor->image)}} " width="50">
                        
                          @endif
                          <input type="file" name="image" class="">
                        </div>
                        <div class="form-group">
                          <label>Address</label>
                          <input type="text" name="address" class="form-control" autocomplete="off"value="{{$doctor->address}}">
                        </div>
                        <div class="form-group">
                          <label>Gender</label>
                          <select class="form-control" name="gender">
                            <option value="0"@if ($doctor->gender == 0) selected @endif>Male</option>
                            <option value="1"@if ($doctor->gender == 1) selected @endif>Female</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Salary</label>
                          <input type="text" name="salary" class="form-control" value="{{$doctor->salary}}" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label>From</label>
                          <input type="date" name="from" class="form-control" autocomplete="off"value="{{$doctor->from}}">
                        </div>
                        <div class="form-group">
                          <label>To</label>
                          <input type="date" name="to" class="form-control" value="{{$doctor->to}}"autocomplete="off">
                        </div>
                        
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="submit" name="updateSpeciality" class="btn btn-primary btn-block form-control" value="Save Change">
                    </div>
                </form>
              </div>
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