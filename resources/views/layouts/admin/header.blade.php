<div class="wrapper">
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <ul class="navbar-nav">
      <li class="nav-item">
        <button class="nav-link btn btn-light" data-widget="pushmenu"><i class='fa fa-bars'></i></button>
      </li>
      <li class="nav-item d-none ml-5 d-sm-inline-block">
        <a href="/" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none ml-5 d-sm-inline-block">
        <a href="/admin/login" class="nav-link">Login</a>
      </li>
    </ul>

    <form class="form-inline ml-5">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search"/>
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset("imgs/avatar2.png")}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset("imgs/avatar.png")}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="/" class="brand-link">
          <img src="" alt="Mafete n gifts logo" class="brand-image img-circle elevation-3"
               style="opacity: 1; border-radius: 0">
          <span class="brand-text font-weight-light">Mafete</span>
        </a>

        <div class="sidebar">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="" class="img-circle elevation-2" alt="User"/>
            </div>
            <div class="info">
              <a href="/admin" class="d-block">Alexander Pierce</Link>
            </div>
          </div>
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item has-treeview menu-open">
                <a href="/admin" class="nav-link active">
                  <i class="fa fa-dashboard nav-icon"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="/admin/products" class="nav-link">
                   <i class="fa fa-edit nav-icon"></i>
                  <p>
                    Products  
                    <i class="right fa fa-angle-right"></i>
                  </p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="/admin/users" class="nav-link">
                  <i class="fa fa-users nav-icon" aria-hidden="true"></i>
                  <p>
                    Users
                    <i class="fa fa-angle-right right"></i>
                  </p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="/admin/categories" class="nav-link">
                  <i class="nav-icon fa fa-book"></i>
                  <p>
                    Categories
                    <i class="fa fa-angle-right right"></i>
                  </p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="/admin/slides" class="nav-link">
                  <i class="nav-icon fa fa-book"></i>
                  <p>
                    Slides
                    <i class="fa fa-angle-right right"></i>
                  </p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="/admin/abouts" class="nav-link">
                  <i class="nav-icon fa fa-book"></i>
                  <p>
                    About page
                    <i class="fa fa-angle-right right"></i>
                  </p>
                </a>
              </li>
               <li class="nav-item has-treeview">
                <a href="/admin/settings" class="nav-link">
                  <i class="nav-icon fa fa-book"></i>
                  <p>
                    App settings
                    <i class="fa fa-angle-right right"></i>
                  </p>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </aside>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>