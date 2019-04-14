<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{asset('imgs/icon.png')}}">
    <title>{{isset($page_title)? $page_title . " - Mafete n Gifts" : "Mafete n Gifts"}}</title>
    {{-- Font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- css --}}
    {{-- Google fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Cinzel:400,700,900|Montserrat:400,400i,500,500i,600,700|Raleway:400,400i,500,600|Roboto:300,400,400i,500,700" rel="stylesheet">
    {{-- Static assets --}}
    <link rel="stylesheet" href="{{asset("foundation/css/foundation.min.css")}}">
    <link rel="stylesheet" href="{{asset("font-awesome/css/font-awesome.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("owl/dist/assets/owl.carousel.min.css")}}">
    <link rel="stylesheet" href="{{asset("owl/dist/assets/owl.theme.default.min.css")}}">
    <link rel="stylesheet" href="{{asset("slick/slick/slick.css")}}">
    <link rel="stylesheet" href="{{asset("slick/slick/slick-theme.css")}}">
    <link rel="stylesheet" href="{{asset("chocolat/css/chocolat.css")}}">
    <link rel="stylesheet" href="{{asset("css/toastr.css")}}">
    <link rel="stylesheet" href="{{asset("css/animate.css")}}">
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
  </head>

  <body>
      <div id="preloder">
          <div class="loader"></div>
      </div>
    @include("includes.header")

    @if(Route::currentRouteName() === "home") @include("includes.carousel") @endif
    
      @yield("content")

    @include("includes.footer")
    <script src="{{asset("js/jquery.min.js")}}"></script>
    <script src="{{asset("js/toastr.js")}}"></script>
    <script src="{{asset("js/app.js")}}"></script>
    <script src="{{asset("owl/dist/owl.carousel.min.js")}}"></script>
    <script src="{{asset("slick/slick/slick.min.js")}}"></script>
    <script src="{{asset("chocolat/js/jquery.chocolat.min.js")}}"></script>
    <script src="{{asset("js/wow.js")}}"></script>
    <script>
        $(function() {
                
          var menubar = $(".menu-bar");
          var drawer = $(".menu-drawer");
          var menuItem = $(".menu-item");
          drawer.on("click", function(e) {
            
            if(window.innerWidth < 720) {
              if(menuItem[0].style.display === "" || menuItem[0].style.display === "none") {
                menuItem.slideDown(); 
              } else {
                if(menuItem[0].style.display === 'block') {
                  menuItem.slideUp();
                }
              }
            } else {
              
            }
            window.onresize = function(e) {
              if(window.innerWidth > 720) {
                if(menuItem[0].style.display === "" || menuItem[0].style.display === "none" || menuItem[0].style.display === "block") {
                  menuItem.css({display: "flex"});
                }
              } else {
                menuItem.css({display: "none"});
              }
            }
          })
        })
        @if(session("success"))
          toastr.success("{{session('success')}}");
        @endif
    </script>
  </body>
</html>