<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('backend-assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('backend-assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('profile.index',['id' => auth()->user()->id]) }}" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
              <a href="{{ route('dashboard.index') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p class="text">Dashboard</p>
              </a>
            </li>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Portfolio
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview {{ is_active('portfolio') }}">
              <li class="nav-item {{ is_active('portfolio') }}">
                <a href="{{ route('portfolio.index') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Portfolios</p>
                </a>
               </li>
          </ul>
        </li>
        <li class="nav-item has-treeview ">
                <a href="#" class="nav-link ">
                  <i class="nav-icon fas fa-file-pdf"></i>
                  <p>
                    Document
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview {{ is_active('portfolio') }}">
                  <li class="nav-item {{ is_active('portfolio') }}">
                    <a href="{{ route('portfolio.document') }}" class="nav-link ">
                      <i class="nav-icon far fa-circle text-danger"></i>
                      <p>New Document</p>
                    </a>
                    <a href="{{ route('document.show') }}" class="nav-link ">
                      <i class="nav-icon far fa-circle text-danger"></i>
                      <p>Show Document</p>
                    </a>
                  </li>
                </ul>
              </li>
       
          <li class="nav-item has-treeview ">
          <li class="nav-item">
            <a href="{{ route('setting.index') }}" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p class="text">Settings</p>
            </a>
          </li>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>