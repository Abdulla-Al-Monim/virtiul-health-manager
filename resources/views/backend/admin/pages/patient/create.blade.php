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
              <li class="breadcrumb-item active">Add Patient</li>
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
                <h6 class="card-title">Add a new Patient</h6>
                <p class="card-text"></p>
                  <form action="{{route('patient.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label>Profile</label>
                        <input type="file" name="image" class="">
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" name="gender">
                          <option value="0">Male</option>
                          <option value="1">Female</option>
                        </select>
                      </div>
                    <div class="form-group">
                      <input type="submit" name="addPatient" class="btn btn-primary btn-block form-control" value="Add New Patient">
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