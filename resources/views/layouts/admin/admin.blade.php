<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{isset($page_title) ? $page_title : "" }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Styles -->
    {{-- <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}"> --}}
    <link rel="stylesheet" href="{{asset("css/adminlte.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
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
    <script src="{{asset("js/bootstrap.min.js")}}"></script>
    <script src="{{asset("js/adminlte.min.js")}}"></script>
    <script src="{{asset("tinymce/jquery.tinymce.min.js")}}"></script>
    <script src="{{asset("tinymce/tinymce.min.js")}}"></script>
    <script>
       tinymce.init({
        selector: 'div.content',
        height: 400,
        statusbar: false,
        plugins: ['image', 'hr', 'insertdatetime', 'link', 'lists', 'media', 'preview', 'table', 'visualblocks', 'visualchars', 'toc', 'autosave', 'help', 'save', 'pagebreak', 'tabfocus', 'emoticons', 'fullscreen'],
        theme: 'silver',
      })
    </script>
  </body>
</html>
