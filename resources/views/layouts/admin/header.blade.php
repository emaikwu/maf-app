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
        <form action="{{route("logout")}}" method="POST">
          @csrf
          <button class="btn btn-flat btn-block btn-dark text-light">Logout</button>
        </form>
      </li>
    </ul>

    <form action="/admin/s" method="GET" class="form-inline ml-5">
      <div class="input-group input-group">
        <input class="form-control form-control-navbar" type="search" placeholder="Search products" aria-label="Search" autofocus name="query">
        <div class="input-group-append">
          <button id="search-btn" class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
          <!-- Sidebar Menu -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="/" class="brand-link">
          <img src="/imgs/logo.png" alt="Mafete n gifts logo" class="brand-image img-circle elevation-3"
               style="opacity: 1; border-radius: 0">
          <span class="brand-text font-weight-light">Mafete n Gifts</span>
        </a>

        <div class="sidebar">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              @if(Auth::user())
                @if(Auth::user()->photo)
                  <img src="/images/users/{{Auth::user()->photo}}" class="img-circle elevation-2" alt="{{Auth::user()->first_name . " " . Auth::user()->last_name}}"/>
                @else 
                  <img src="/imgs/user.png" class="img-circle elevation-2" alt="{{Auth::user()->first_name . " " . Auth::user()->last_name}}"/>
                @endif
              @else
              <img src="/imgs/user.png" class="img-circle elevation-2" alt="User"/>
              @endif
            </div>
            <div class="info">
              @if(Auth::user())
                <a href="/admin" class="d-block">{{Auth::user()->first_name . " " . Auth::user()->last_name}}</a>  
              @endif
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
                   <i class="fa fa-gift nav-icon"></i>
                  <p>
                    Products  
                    <i class="right fa fa-angle-right"></i>
                  </p>
                </a>
              </li>
                @auth
                  @if(Auth::user()->role === "admin")
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
                        <i class="nav-icon fa fa-info-circle"></i>
                        <p>
                          About page
                          <i class="fa fa-angle-right right"></i>
                        </p>
                      </a>
                    </li>
                    <li class="nav-item has-treeview">
                      <a href="/admin/settings" class="nav-link">
                        <i class="nav-icon fa fa-gear"></i>
                        <p>
                          App settings
                          <i class="fa fa-angle-right right"></i>
                        </p>
                      </a>
                    </li>
                  @endif
                @endauth
            </ul>
          </nav>
        </div>
      </aside>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>