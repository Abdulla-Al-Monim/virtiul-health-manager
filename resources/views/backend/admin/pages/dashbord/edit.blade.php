@extends('backend.admin.layout.template')
@section('dashboard-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashbord')}}">Dashbord</a></li>
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
                  <form action="{{route('admintProfile.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" autocomplete="off">
                        </div>
                        <div class="form-group">
                          @if(Auth::user()->image == NULL)
                        
                            no image found
                        
                          @else
                        
                            <img src="{{ asset('backend/img/users/' . Auth::user()->image)}} " width="50">
                        
                          @endif
                          <input type="file" name="image" class="">
                        </div>

                    <div class="form-group">
                      <input type="submit" name="updatePatient" class="btn btn-primary btn-block form-control" value="Save Change">
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