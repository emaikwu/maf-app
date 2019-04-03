<!doctype html>
<html class="no-js" lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{isset($page_title)? $page_title . " | Mafete n Gifts" : "Mafete n Gifts"}}</title>
    <link rel="stylesheet" href="{{asset("foundation/css/foundation.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
  </head>

  <body>
    @include("includes.header")

    @if(Route::currentRouteName("home")) @include("includes.carousel") @endif
    
      @yield("content")

    @include("includes.footer")
    <script src="{{asset("foundation/js/vendor/jquery.js")}}"></script>
    <script src="{{asset("foundation/js/vendor/foundation.min.js")}}"></script>
    <script src="{{asset("foundation/js/app.js")}}"></script>
  </body>

</html>