<div class="sidebar" >
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ ('/template/dist/img/1.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        @auth
        <a href="#" class="d-block"> {{Auth::user()->name}} </a>
        @endauth

        @guest
        <a href="#" class="d-block">Belum Login </a>
        @endguest
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        @auth
        <li class="nav-item">
          <a href="/dashboard" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        @endauth
        @auth
        <li class="nav-item">
          <a href="/products" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Product
            </p>
          </a>
        </li>
        @endauth


      </nav>
    <!-- /.sidebar-menu -->
  </div>
