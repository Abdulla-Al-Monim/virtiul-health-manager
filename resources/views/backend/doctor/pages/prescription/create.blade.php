@extends('backend.doctor.layout.template')

@section('dashboard-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Prescription</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashbord')}}">Dashbord</a></li>
              <li class="breadcrumb-item active">Create Prescription</li>
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
                <h6 class="card-title">Create a new Prescription</h6>
                <p class="card-text"></p>
                  <form action="{{route('prescription.store',$patient_ids)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Problem</label>
                        <input type="text" name="pattient_problem" class="form-control" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label>Medicine</label>
                        <input type="text" name="medicine" class="form-control" autocomplete="off">
                      </div>
                      
                    <div class="form-group">
                      <input type="submit" name="cratePrescriptiion" class="btn btn-primary btn-block form-control" value="Add New Patient">
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