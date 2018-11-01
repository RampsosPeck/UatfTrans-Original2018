 <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/img/student.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      <li @click="menu=0" class="nav-item">
            <a  href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt blue"></i>
                <p>
                Tablero
                </p>
            </a>
      </li>
        
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link ">
          <i class="nav-icon fas fa-cogs green"></i>
          <p>
            Administración
            <i class="right fa fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li @click="menu=1" class="nav-item" style="text-align:center; ">
            <a href="#" class="nav-link ">
              <i class="fa fa-users teal"></i>
              <p>Usuarios</p>
            </a>
          </li>
          <li @click="menu=2" class="nav-item" style="text-align:center; ">
              <a href="#" class="nav-link">
                  <i class="nav-icon fab fa-android cyan"></i>
                  <p>
                  Developer
                  </p> 
              </a>
          </li>
        </ul>
      </li>
      <li @click="menu=3" class="nav-item">
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-eye yellow"></i>
              <p>
              Escanear Código QR
              </p>
          </a>
      </li>
      <li @click="menu=4" class="nav-item">
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-qrcode orange"></i>
              <p>Mi código QR</p>
          </a>
      </li> 
      <li @click="menu=5" class="nav-item">
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie purple"></i>
              <p>
              Reportes
              </p>
          </a>
      </li>
      <li @click="menu=6" class="nav-item">
          <a  href="#" class="nav-link">
              <i class="nav-icon fas fa-hands-helping pink"></i>
              <p>
              Ayuda
              <span class="right badge badge-danger">PDF</span>
              </p> 
          </a>
      </li>
      <li @click="menu=7" class="nav-item">
          <a href="#" class="nav-link">
              <i class="nav-icon fab fa-android cyan"></i>
              <p>
              Acerca de...
              <span class="right badge badge-info">IT</span>
              </p> 
          </a>
      </li>  
      <li class="nav-item"> 
          <a class="nav-link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              <i class="nav-icon fas fa-power-off red"></i>
              <p> {{ __('Logout') }} </p>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
      </li>
      </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar --> 