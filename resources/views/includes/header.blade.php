<div id="menu-bar">
    <div class="menu-left">
      <div class="logo">
        <a href="{{route("home")}}">
          <img src="/imgs/logo.png" alt="Mafete n Gifts' logo">
          <h1>Mafete n Gifts</h1>
        </a>
      </div>
    </div>
    <div class="menu-right">
      <div class="nav-wrapper">
          <ul class="menu-item">
              <li><a class="{{Route::currentRouteName() === 'home'? "active"  : null }}" href="{{route("home")}}">Home</a></li>
              <li><a class="{{Route::currentRouteName() === 'products' || Route::currentRouteName() === "product" || Route::currentRouteName() === 'search' ? "active"  : null }}" href="{{route("products")}}">Products</a></li>
              <li><a class="{{Route::currentRouteName() ==='contact'? "active"  : null }}" href="{{route("contact")}}">Contact</a></li>
              <li><a class="{{Route::currentRouteName() === 'about'? "active"  : null }}" href="{{route("about")}}">About</a></li>
              <li class="search">
                <form action="/search" method="GET">
                  <div class="search-wrapper">
                    <input type="search" autofocus name="q" placeholder="Search our site">
                    <div id="search-results"></div>
                  </div>
                </form>
                <button class="search-btn"></button>
              </li>
            </ul>
            <div class="menu-drawer">
              <button role="button"><i class="fa fa-bars" aria-hidden="true"></i></button>
            </div>
      </div>
    </div>
  </div>