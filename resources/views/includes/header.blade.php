<div @if(Route::currentRouteName() == "home")id="home-navigation" @endif class="top-bar">
    <div class="top-bar-left">
      <ul class="menu">
        <div class="logo">
          <a href="">
            <img src="/imgs/logo.png" alt="Mafete n Gifts' logo">
            <h1>Mafete n Gifts</h1>
          </a>
        </div>
      </ul>
    </div>
    <div class="top-bar-right">
      <ul class="menu">
        <li><a class="{{Route::currentRouteName() == 'home'? "active"  : null }}" href="{{route("home")}}">Home</a></li>
        <li><a class="{{Route::currentRouteName() == 'products'? "active"  : null }}" href="{{route("products")}}">Products</a></li>
        <li><a class="{{Route::currentRouteName() == 'contact'? "active"  : null }}" href="{{route("contact")}}">Contact</a></li>
        <li><a class="{{Route::currentRouteName() == 'about'? "active"  : null }}" href="{{route("about")}}">About</a></li>
      </ul>
    </div>
  </div>