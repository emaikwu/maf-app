@php    
    $page_title = $mode["edit"] ? "Edit About Page - Mafete n Gifts" : "Add About Page - Mafete n Gifts";
    $title = $mode["edit"] ? "EDIT ABOUT PAGE" : "ADD ABOUT PAGE";
    $active = $mode["edit"] ? "Edit Page" : "Add Page";
    $items = $mode["edit"] ?
    [
        ["name" => "About", "link" => "/admin/abouts"], 
        ["name" => "Add page", "link" => "/admin/abouts/create"], 
    ]
    :
    [
        ["name" => "About", "link" => "/admin/abouts"], 
    ];
@endphp

@extends('layouts.admin.admin')
@section('content')

  <form action="{{$mode["edit"] ? "/admin/abouts/$about->id?_method=PUT" : "/admin/abouts"}}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($mode["edit"])
      @method("PUT")
    @endif
    <div class="form-group">
      <label for="photo">Page photo <span class="error">{{$errors->first("photo")}}</span></label>
    <input type="file" value="{{old("photo")}}" class="form-control" name="photo" id="photo"">
    </div>
    <div class="form-group">
    <label for="content">Page content <span class="error">{{$errors->first("content")}}</span></label>
      <textarea name="content" class="form-control content">{{$mode["edit"] ? $about->content: old("content")}}</textarea>
    </div>
    <div class="form-group">
      <button id="admin-btn">{{$mode["edit"] ? "SAVE" : "ADD PAGE"}}</button>
    </div>
  </form>
@endsection