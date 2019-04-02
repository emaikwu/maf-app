<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{isset($page_title) ? $page_title : "" }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Jquery -->
    {{-- <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script> --}}
   {{-- Owl carousel --}}
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <!-- Toastr -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset("css/adminlte.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    <link rel="stylesheet" href="{{asset("owl/dist/assets/owl.theme.default.min.css")}}">
    <link rel="stylesheet" href="{{asset("owl/dist/assets/owl.theme.green.min.css")}}">
  </head>
  <body class="hold-transition sidebar-mini">
    @include('layouts.admin.header')
    <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2 admin_title">
              <div class="col-sm-12 mx-auto">
                <div class='row'>
                  <div class="col-sm-6"><h1>{{$title}}</h1></div>
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      @foreach ($items as $item)
                              <li class="breadcrumb-item">
                                  <a href={{$item["link"]}}>{{$item["name"]}}</a>
                              </li>
                            @endforeach
                            @if(isset($active))
                                <li class="breadcrumb-item active">{{$active}}</li>
                            @endif
                    </ol>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    
        <section id="content" class="content" style="background:#fff; min-height:85vh;">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-10 mx-auto">
                @yield("content")
              </div>
            </div>
          </div>
        </section>
    </div>
    @include('layouts.admin.footer')
    <script src="{{asset("js/jquery.min.js")}}"></script>
    <script src="{{asset("js/toastr.js")}}"></script>
    <script src="{{asset("js/adminlte.min.js")}}"></script>
    <script src="{{asset("tinymce/jquery.tinymce.min.js")}}"></script>
    <script src="{{asset("tinymce/tinymce.min.js")}}"></script>
    <script src="{{asset("owl/dist/owl.carousel.min.js")}}"></script>
    <script>
      tinymce.init({
        selector: 'textarea.content',
        height: 400,
        statusbar: false,
        plugins: ['image', 'hr', 'insertdatetime', 'link', 'lists', 'media', 'preview', 'table', 'toc', 'autosave', 'help', 'save', 'pagebreak', 'tabfocus', 'fullscreen'],
        theme: 'silver',
      })
      // toastr setup
      @if(session("success"))
        toastr.success("{{session('success')}}");
      @endif
      @if(session("info"))
        toastr.info("{{session('info')}}");
      @endif
      //owl-carousel setup
      $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        autoplay: true,
        items:1,
        autoWith:true,
        autoplayHoverPause: true
      })
    </script>
  </body>
</html>