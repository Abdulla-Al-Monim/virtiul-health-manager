  <!-- Main Sidebar Container -->
  @if( Route::has('login'))
    @auth
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashbord')}}" class="brand-link">
    
      <span class="brand-text font-weight-light">Dashbord</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">Doctor Manage</li>
          <li class="nav-item">
            <a href="{{route('doctor.manage')}}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                 Doctor List
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('doctor.add')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Doctor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('doctor.manage')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Doctor</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Doctor Specialities
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('speciality.add')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Doctor Specilaty</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('speciality.manage')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Specilaties</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-header">Patient Manage</li>
          <li class="nav-item">
            <a href="{{route('doctor.manage')}}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                 Patient List
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('patient.add')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Patient</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('patient.manage')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Patient</p>
                </a>
              </li>
              
            </ul>
            <li class="nav-item">
                <a href="{{route('appointDoctor.manage')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Appoint List</p>
                </a>
              </li>
          </li>
          <li class="nav-item">
            <a href="{{route('user.manage')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>User Management</p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="{{route('test.manage')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Test Report</p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="{{route('admin.change.password')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Change Password</p>
            </a>
          </li>
          
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
    @endif

@endif