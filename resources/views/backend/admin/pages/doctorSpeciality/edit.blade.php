@extends('backend.admin.layout.template')
@section('dashboard-content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update Speciality</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashbord')}}">Dashbord</a></li>
              <li class="breadcrumb-item active">Upate Speciality</li>
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
                

                <p class="card-text"></p>
                  <form action="{{ route('speciality.update', $doctorSpeciality->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label>Brand Name</label>
                      <input type="text" name="speciality" class="form-control" required="required" autocomplete="off" value="{{$doctorSpeciality->speciality}}">
                    </div>


                    <div class="form-group">
                      <input type="submit" name="updateSpeciality" class="btn btn-primary btn-block" value="Save Changes">
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