@extends('backend.admin.layout.template')
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
                        <th scope="col">Medicine</th>
                      </tr>
                    </thead>
                  <tbody>
                    @php
                      $i = 1;
                    @endphp
                    @foreach($prescriptions as $prescription)
                    <tr>
                      <td scope="row">
                      	<a href="{{route('admin.patient.prescription',$prescription->id)}}">{{$i}}</a>
                        
                      </td>
                      <td>{{$prescription->doctor_name}}</td>
                      <td>{{$prescription->pattient_name}}</td>
                      <td>{{$prescription->pattient_phone}}</td>
                      <td>{{$prescription->pattient_email}}</td>
                      <td>{{$prescription->pattient_problem}}</td>
                      <td>{{$prescription->medicine}}</td>
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